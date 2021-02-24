# Secret Aligner - Prueba Técnica

La prueba consiste en hacer una app para llevar el control de una ToDo list.

Puesta en marcha de la prueba
```
git clone [..]
composer udpate
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
```
### Lista de tarea
1. Crear estructura para proyecto symfony 3.4 
   - Duración: 5 minutos
   - Difultad: Fácil
   - [Pull Request](https://github.com/ONsistems/pruebas-tecnicas/pull/1)
2. Crear entidad TODO (campos: nombre, fecha creación (automática), fecha tope, estado)
   - Duración: 15 minutos
   - Difultad: Media
   - [Pull Request](https://github.com/ONsistems/pruebas-tecnicas/pull/2)
3. Crear interfaz para añadir elementos a la lista y visualizar el listado
   - Duración: 45 minuto
   - Difultad: Media
   - [Pull Request](https://github.com/ONsistems/pruebas-tecnicas/pull/3)
4. Posibilidad de marcar como realizada la tarea y diferenciar visualmente de las pendientes
   - Duración: 20 minuto
   - Difultad: Media
   - [Pull Request](https://github.com/ONsistems/pruebas-tecnicas/pull/4)
5. Crear un comando de Symfony para añadir elementos a la lista por terminal
   - Duración: 2 horas
   - Difultad: Dificil
   - [Pull Request](https://github.com/ONsistems/pruebas-tecnicas/pull/5)
6. Modificar la interfaz realizada en el punto 3 para realizar las modificaciones por ajax
   - Duración: 20 minutos
   - Difultad: Facil
   - [Pull Request](https://github.com/ONsistems/pruebas-tecnicas/pull/6)
7. Añadir login y autenticar la aplicación. Crear un rol admin para gestionar todos las listas. Un rol usuario accederá únicamente a su lista. 
   - Duración: 3 horas
   - Difultad: Muy Dificil
   - [Pull Request](https://github.com/ONsistems/pruebas-tecnicas/pull/7)
8. Añadir para un usuario con rol admin la posibilidad de modificar el dueño de la lista, pudiendo un usuario tener varias listas de TODO 
   - Duración: 30 minutos
   - Difultad: Media
   - [Pull Request](https://github.com/ONsistems/pruebas-tecnicas/pull/8)
9. Añadir creación de usuarios 
   - Duración: SIN REALIZAR
   - Difultad:
   - Pull Request
10. Un admin puede visualizar las listas TODO del resto de usuarios pero no modificar sus elementos 
    - Duración: 10 minutos
    - Difultad: Facil
    - [Pull Request](https://github.com/ONsistems/pruebas-tecnicas/pull/9)
11. Añadir logs de aplicación para trackear el seguimiento de las iteraciones con cada una deas listas
    - Duración: 15 minutos
    - Difultad: Facil
    - [Pull Request](https://github.com/ONsistems/pruebas-tecnicas/pull/10)
12. Crear un servicio de notificaciones para enviar un email al administrador cada vez que se completan todas las tareas de una lista
    - Duración: 45 minutos
    - Difultad: Media
    - [Pull Request](https://github.com/ONsistems/pruebas-tecnicas/pull/11)
