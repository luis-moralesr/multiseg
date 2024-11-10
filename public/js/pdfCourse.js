document.addEventListener('DOMContentLoaded', function () {
    const generatePDFButton = document.getElementById('generatePDF');

    if (generatePDFButton) {
        generatePDFButton.addEventListener('click', async function () {
            const certificationId = this.getAttribute('data-id');

            try {
                // Obtener los datos de la certificación desde el servidor usando axios
                const response = await axios.get(`/certification/${certificationId}/data`);
                const service = response.data;

                if (!service) {
                    console.error('Error: No se encontraron datos de la certificación.');
                    alert('Error: No se encontraron datos de la certificación.');
                    return;
                }

                // Cargar la plantilla PDF desde la ruta especificada
                const pdfUrl = '../templates/diploma.pdf'; // Cambia esto a la ruta correcta de la plantilla
                const pdfBytes = await fetch(pdfUrl).then(res => res.arrayBuffer());

                // Cargar la plantilla PDF en pdf-lib
                const { PDFDocument, StandardFonts } = PDFLib;
                const pdfDoc = await PDFDocument.load(pdfBytes);
                const page = pdfDoc.getPage(0);

                // Cargar la fuente estándar Times Roman en estilo itálico
                const customFont = await pdfDoc.embedFont(StandardFonts.TimesRomanItalic);

                // Configuración de tamaño de fuente y márgenes
                let fontSize = 25;
                let margin = 50; // Márgenes desde los bordes
                const pageWidth = page.getWidth();

                // Función para dividir texto en varias líneas y centrarlo dentro de una celda
                const drawCenteredTextInCell = (text, x, y, maxWidth, fontSize) => {
                    const lines = [];
                    let currentLine = '';

                    // Dividir texto en líneas que quepan dentro del ancho máximo
                    text.split(' ').forEach(word => {
                        const testLine = currentLine + (currentLine.length ? ' ' : '') + word;
                        const lineWidth = customFont.widthOfTextAtSize(testLine, fontSize);

                        if (lineWidth > maxWidth) {
                            lines.push(currentLine);
                            currentLine = word;
                        } else {
                            currentLine = testLine;
                        }
                    });

                    if (currentLine) {
                        lines.push(currentLine);
                    }

                    // Dibujar cada línea centrada horizontalmente
                    lines.forEach(line => {
                        const lineWidth = customFont.widthOfTextAtSize(line, fontSize);
                        const lineX = x + (maxWidth - lineWidth) / 2; // Centrado horizontalmente
                        page.drawText(line, { x: lineX, y, size: fontSize, font: customFont });
                        y -= fontSize + 4; // Espacio entre líneas
                    });
                };

                // Ancho máximo para el texto en la celda
                let maxTextWidth = pageWidth - 2 * margin;

                // Posición vertical específica para el texto
                let specificYPosition = 225; // Ajusta para la posición deseada

                // Dibujar el nombre del estudiante en la posición especificada
                drawCenteredTextInCell(service.student_name, margin, specificYPosition, maxTextWidth, fontSize);

                fontSize = 12;
                specificYPosition = 200; // Ajusta para la posición deseada
                drawCenteredTextInCell('Por concluir satisfactoriamente su capacitación en', margin, specificYPosition, maxTextWidth, fontSize);
                fontSize = 15;
                specificYPosition = 175; // Ajusta para la posición deseada
                drawCenteredTextInCell(service.course_name, margin, specificYPosition, maxTextWidth, fontSize);

                margin = 50;
                maxTextWidth = pageWidth - margin * 2; // Ajusta el ancho máximo restando los márgenes
                fontSize = 10;

                // Posición y formato de fecha para la parte inferior del PDF
                const xPosition = pageWidth - maxTextWidth - margin; // Alineado a la derecha con margen
                specificYPosition = 50;

                const drawRightAlignedText = (text, y, fontSize) => {
                    const textWidth = customFont.widthOfTextAtSize(text, fontSize);
                    const x = pageWidth - textWidth - margin; // Alinea a la derecha con el margen especificado
                    page.drawText(text, { x, y, size: fontSize, font: customFont });
                };
                const textToDraw = `Código: ${service.key}`;
                const date = new Date(service.create_at);

                // Formatear la fecha en formato 'dd/mm/yyyy hh:mm:ss'
                const formattedDate = date.toLocaleString('es-ES', {
                    year: 'numeric',
                    month: 'numeric',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: false, // Formato de 24 horas
                });

                const textToDrawTwo = `Fecha: ${formattedDate}`;

                // Llamar a la función drawRightAlignedText
                drawRightAlignedText(textToDraw, specificYPosition, fontSize);
                specificYPosition = 30;
                drawRightAlignedText(textToDrawTwo, specificYPosition, fontSize);

                // Guardar el PDF actualizado
                const pdfBytesUpdated = await pdfDoc.save();

                // Descargar el PDF modificado
                const blob = new Blob([pdfBytesUpdated], { type: 'application/pdf' });
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `certification_${certificationId}.pdf`;
                a.click();
                window.URL.revokeObjectURL(url);
            } catch (error) {
                console.error('Error al generar el PDF:', error);
                alert('Error al generar el PDF. Por favor, inténtalo de nuevo.');
            }
        });
    } else {
        console.error('Botón de generación de PDF no encontrado en la vista.');
    }
});
