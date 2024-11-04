<div class="container">
    <div class="row mb-2">
        <div class="col">
            <div class="text-start mt-3">
                <a href="{{asset('/welcome')}}">
                    <button class="btn btn-primary">Regresar</button>
                </a>
            </div>
        </div>
    </div>
   <div class="row mb-2 mt-3">
    <div class="col-12 col-md-6">
        <h1>Multiseg</h1>
       </div>
       <div class="col-12 col-md-6">
        <form action="{{route('welcome.index')}}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nombre del curso" aria-label="Recipient's username" aria-describedby="button-addon2" name="name">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">BUSCAR</button>
                  </div>
        </form>
       </div>
   </div>
</div>
