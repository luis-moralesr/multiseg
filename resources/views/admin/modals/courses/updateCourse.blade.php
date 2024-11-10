<div class="modal fade" id="updateCourse{{ $course->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">ACTUALIZAR CURSO</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('courses.update', $course->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
          <div class="modal-body">
              <div class="container">
                  <div class="row">
                      <div class="col">
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="nameInput" placeholder="Nombre del curso" name="name" value="{{$course->name}}">
                              <label for="nameInput">Nombre</label>
                            </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col">
                          <div class="form-floating mb-3">
                              <textarea  type="text" class="form-control" id="descriptionInput" placeholder="Descripción del curso" name="description" style="height: 100px">{{$course->description}}</textarea>
                              <label for="descriptionInput">Descripción</label>
                            </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col">
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="linkInput" placeholder="Ingrese la Url" name="url" value="{{$course->url}}">
                              <label for="linkInput">Url del Video</label>
                            </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="statusSelect" name="status">
                                <option value="active" {{ $course->status == 'active' ? 'selected' : '' }}>Activo</option>
                                <option value="inactive" {{ $course->status == 'inactive' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                            <label for="statusSelect">Estatus</label>
                        </div>
                    </div>
                </div>

                  <div class="row">
                      <div class="col">
                          <label for="imageInput" class="form-label">Imagen miniatura</label>
                          <div class="input-group mb-3">
                              <input type="file" class="form-control" id="imageInput" name="image">
                          </div>
                      </div>
                  </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        </div>
      </div>
    </div>
