## feat
 - entities: user, role ✔
 - dao: user, role, movie_user ✔
 - business: user, role, movie_user ✔
 - vistas: user, role, movie_user en back. movies que el usuario tenga en front. Login en ambas. ✔
 - implementar sesiones ✔
 - auth: agregar autenticación y lógica de negocios ✔
 - login/register: Verificar que todos los campos estén completos ✔
 - logout desde admin, navbar overhaul. ✔
 - añadir image upload en movie en admin ✔
 - añadir image table view en admin ✔
 - vista: user_movies.php => añadir paginado ✔
 - agregar la pelicula propiamente dicha en la vista de movie ✔
 - añadir crop/resize de imagen 
 - agregar galeria en vista individual de movie
 
## adminpanel
 - redirigir si el usuario no esta logeado/no tiene permiso ✔

## error
 - RedirectException: Guardar el mensaje en la sesion, y para luego poder mostrarlo en la página. ✔
 - Testear redireccionamiento de errores no capturados ✔
 - Capturar error cuando una pelicula no tiene categorias en la vista individual de la pelicula ✔
 - Dejar una imagen por defecto. ✔
 - Ver el comportamiento con mas de 1 banner por pelicula -> Solo la primera es mostrada. ✔