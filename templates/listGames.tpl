<div class="d-flex justify-content-end">
    {if isset($smarty.session.USER_PERMISSIONS) && $smarty.session.USER_PERMISSIONS == 1}                   
        <a href="logout" class="m-3 btn btn-outline-danger w-5">Logout</a>
        {else}
            <a href="login" class="m-3 btn btn-outline-warning w-5">Login</a>   
    {/if}
    
</div>

<div class="container">

   <div class="list-group text-center m-10">
        <div class="d-flex justify-content-center">
            {if isset($smarty.session.USER_PERMISSIONS) && $smarty.session.USER_PERMISSIONS == 1}                
                    <a href="ShowFormAddGame" class="m-2 btn btn-primary w-25">Agregar</a>
            {/if}
        </div>
    
        <ul class="list-group list-group-flush">
            {foreach from=$juegos item=$juego}
                
                <a href="game/{$juego->id}" class="list-group-item list-group-item-action border border-2 border-info rounded m-2 p-0">
                    <li class="list-group-item list-group-item-action list-group-item-primary d-flex m-10 align-items-center justify-content-between ">
                        <img class="text-body" src="{$juego->imagen}" alt="{$juego->nombre}">
                        <h3 class="$purple-500">{$juego->nombre}</h3>
                        {if isset($smarty.session.USER_PERMISSIONS) && $smarty.session.USER_PERMISSIONS == 1}   
                            <form action="delete/{$juego->id}" method="POST">
                                <button class="m-2 btn btn-outline-danger w-5">X</button>    
                            </form>
                            {else}
                                <h1 class="$purple-500">🕹️</h1>
                        {/if}                 
                    
                    </li>
                </a>
            {/foreach}
        </ul> 
    </div>
</div>
