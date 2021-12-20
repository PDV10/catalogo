<div class="container">
    <div class="card bg-dark m-5">
        {foreach from=$games item=$game}
            <div class="d-flex justify-content-center m-3">
                <iframe width="1000px" height="500px" src="{$game->trailer}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            
        {/foreach}
        <div class="card-body d-flex flex-column align-items-center">
            <h5 class="card-title">Juego: {$game->nombre}</h5> 
            <h5 class="card-title">Empresa: {$game->compania}</h5>
            <h5 class="card-title">Categoría: {$game->categoria}</h5>
            <h5 class="card-title">Compatibilidad: {$game->compatibilidad}</h5>
            <h5 class="card-title">Lanzamiento: {$game->lanzamiento}</h5>
            <a href="home" class="btn btn-outline-info">Volver</a>
        </div>

        
    </div>
</div>
