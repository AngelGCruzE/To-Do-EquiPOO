## Login tareas

la base de datos es bulnerable porque guarda directa la contraseña (hay que usar un hash)

## index

agregar un boton para borrar tareas en especifico 

# Acciones realizadas
-se añadieron alertas a todas las acciones (tarea realizada, usuarios creados, contraseñas y usuarios duplicados)
### seguridad 1.5 hrs
#### funcion login
-Se preparo la consulta para evitar sqli
-se añadio la funcion password_hash para encriptar las contraseñas

#### funcion sing up
-se preparo consulta para evitar sqli 
-se añadio la funcion password_ verify para comparar los hashes de la contraseña

#### SingUp y Login 4hrs
- se elimino login.php y singup.php ya que se unifico en userLS.php ahora este archivo hace las dos funciones aparte de tener un diseño mas 

# Roles

Angel // dev - 
Rayundo // Dev - 
Choi // dev - 

Adriana // analista - 
Miriam // PO - 
Marina // tester - 
#### modificar la base de datos
añadir campos necesarios para cumplir con los requerimientos
users{id,correo,usuario,contraseña,avatar}
todos {id,user_id,task,state,fecha}