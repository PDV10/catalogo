<div class="d-flex justify-content-end">
    <a href="home" class="btn btn-outline-danger m-2">X</a>
</div>

<form action="addSong" method="POST" enctype="multipart/form-data">

    <div class="container w-100">
    
        <div class="text-center">
            <legend>Agregar Juego</legend>
        </div>
            
        <div class="mb-3">
            <input type="hidden" name="id" class="form-control">
            <div class="pt-3">
                <label class="form-label">Nombre del juego</label>
                <input type="text" name="nombre" class="form-control formulario" required="required">
            </div>
            <div class="pt-3">
                <label class="form-label">Nombre de la compañia</label>
                <input type="text" name="compañia" class="form-control formulario" required>
            </div>
            <div class="pt-3">
                <label class="form-label">Compatibilidad</label>
                <input type="text" name="compatibilidad" class="form-control formulario" required>
            </div>
            <div class="pt-3 w-5">
                <label class="form-label">url del Trailer</label>
                <input type="text" name="trailer" class="form-control formulario" required>
            </div>

            <div class="pt-3">
                <label class="form-label">Lanzamiento</label>
                <input type="date" name="lanzamiento" class="form-control formulario">
            </div>
            
            <div class="pt-3">
                <label class="form-label">Imagen de la cancion</label>
                <input type="file" name="input_name" id="imageToUpload"  class="form-control formulario">
            </div>

            <div class="pt-3">
                <label class="form-label">Categoria del juego</label>
                <select name="categorias">
                    {foreach from=$categorias item=$categoria}
                        <option value="{$categoria->id_categoria}">{$categoria->nombre}</option>
                    {/foreach}
                </select>
            </div>
        </div>
        
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
        
    </div>
</form>