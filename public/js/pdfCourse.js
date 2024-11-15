document.addEventListener('DOMContentLoaded', function () {
    const generatePDFButton = document.getElementById('generatePDF');

    if (generatePDFButton) {
        generatePDFButton.addEventListener('click', async function () {
            // Desactivar el botón y mostrar spinner
            generatePDFButton.disabled = true;
            generatePDFButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Generando...';

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
                const pdfUrl = '../templates/diploma.pdf';
                const pdfBytes = await fetch(pdfUrl).then(res => res.arrayBuffer());

                // Cargar la plantilla PDF en pdf-lib
                const { PDFDocument, StandardFonts } = PDFLib;
                const pdfDoc = await PDFDocument.load(pdfBytes);
                const page = pdfDoc.getPage(0);
                const customFont = await pdfDoc.embedFont(StandardFonts.TimesRomanItalic);

                let fontSize = 25;
                let margin = 50;
                const pageWidth = page.getWidth();

                // Función para dividir texto en líneas y centrar
                const drawCenteredTextInCell = (text, x, y, maxWidth, fontSize) => {
                    const lines = [];
                    let currentLine = '';

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

                    lines.forEach(line => {
                        const lineWidth = customFont.widthOfTextAtSize(line, fontSize);
                        const lineX = x + (maxWidth - lineWidth) / 2;
                        page.drawText(line, { x: lineX, y, size: fontSize, font: customFont });
                        y -= fontSize + 4;
                    });
                };

                let maxTextWidth = pageWidth - 2 * margin;
                let specificYPosition = 225;

                drawCenteredTextInCell(service.student_name, margin, specificYPosition, maxTextWidth, fontSize);
                fontSize = 12;
                specificYPosition = 200;
                drawCenteredTextInCell('Por concluir satisfactoriamente su capacitación en', margin, specificYPosition, maxTextWidth, fontSize);
                fontSize = 15;
                specificYPosition = 175;
                drawCenteredTextInCell(service.course_name, margin, specificYPosition, maxTextWidth, fontSize);

                margin = 50;
                maxTextWidth = pageWidth - margin * 2;
                fontSize = 10;

                const xPosition = pageWidth - maxTextWidth - margin;
                specificYPosition = 50;

                const drawRightAlignedText = (text, y, fontSize) => {
                    const textWidth = customFont.widthOfTextAtSize(text, fontSize);
                    const x = pageWidth - textWidth - margin;
                    page.drawText(text, { x, y, size: fontSize, font: customFont });
                };
                const textToDraw = `Código: ${service.key}`;
                const date = new Date(service.create_at);

                const formattedDate = date.toLocaleString('es-ES', {
                    year: 'numeric',
                    month: 'numeric',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: false,
                });

                const textToDrawTwo = `Fecha: ${formattedDate}`;

                drawRightAlignedText(textToDraw, specificYPosition, fontSize);
                specificYPosition = 30;
                drawRightAlignedText(textToDrawTwo, specificYPosition, fontSize);

                const pdfBytesUpdated = await pdfDoc.save();

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
            } finally {
                // Restaurar el botón y ocultar el spinner
                generatePDFButton.disabled = false;
                generatePDFButton.innerHTML = 'Certificado';
            }
        });
    } else {
        console.error('Botón de generación de PDF no encontrado en la vista.');
    }
});
