<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PREOPERACIONALES Y ACTIVIDADES ADICIONALES</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>





</head>

<body>

    <div id="loading-screen">
        <label class="titulos">LADRILLERA LA CLAY</label>
        <div class="spinner"></div>
    </div>




    <form id="signatureForm" method="post" autocomplete="off">
        <h2>ACTIVIDADES DIARIAS</h2>

        <div class="input-group">


        <div class="input-container">
                <i class="fa-solid fa-user"></i>
                <select name="name" id="mecanico">
                    <option value="" disabled selected>MECANICO</option> 
                    <option data-icon="fa fa-cogs" value="LUIS GUILLERMO">LUIS GUILLERMO</option>
                    <option data-icon="fa fa-cogs" value="RAMON PADILLA">RAMON PADILLA</option>
                    <option data-icon="fa fa-cogs" value="ALEXANDER RAMOS">ALEXANDER RAMOS</option>
                    <option data-icon="fa fa-cogs" value="JOSE QUINTANA">JOSE QUINTANA</option>
                </select>
        </div>

            <div class="input-container">
                <input type="date" name="datos" required>
                <i class="fa-solid fa-calendar"></i>
            </div>

        
            <div class="input-container">
                    <i class="fa-regular fa-sun"></i>
                    <select name="maquina" id="maquina" >
                                    
                        <option value="Maquina 1" id="maq">MAQUINA 1</option>
                        <option value="Maquina 3">MAQUINA 3</option>
                        <option value="Maquina 4">MAQUINA 4</option>
                        <option value="Molino 1">MOLINO 1</option>
                        <option value="Molino 2">MOLINO 2</option>
                        <option value="Molino 3">MOLINO 3</option>
                        <option value="Molino de carbon">MOLINO DE CARBON</option>
                        <option value="Horno tunel">HORNO TUNEL</option>
                        <option value="Rapilado">R.APILADO</option>
                        <option value="R.desapilado">R.DESAPILADO</option>
                    </select>

            </div>
                

            

            <div class="input-container">
                <i class="fa-regular fa-file"></i>  
                <label for="texto" class="tarea"></label>
                <input type="text" id="texto" name="tarea" placeholder="Tarea realizada..." required>
            </div>
            
            <div class="input-container">
                <i class="fa-regular fa-hard-drive"></i>    
                <label for="duration-hours"></label>

                <input type="number" id="duration-hours" name="duracion" min="0" step="1" placeholder="Tiemplo empleado en la actividad" required>
                
            </div>



            
            <input type="submit" name="send" class="btn" value="enviar">
        </div>

        <script>
        
        window.onload = function() {
            setTimeout(function() {
                document.getElementById("loading-screen").style.display = "none";
        
                let formContainer = document.getElementById("form-container");
                if (formContainer) {
                    formContainer.style.display = "block";
                }
            },2000);
        };






    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("signatureForm").addEventListener("submit", function (event) {
            event.preventDefault(); // Evita la recarga de la página

            let form = this;
            let formData = new FormData(form);

            fetch("send.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text()) // Capturar respuesta como texto
            .then(data => {
                console.log("Respuesta del servidor:", data); // Mostrar respuesta en la consola

                if (data.includes("Éxito")) {
                    alert("Formulario enviado correctamente"); // Mensaje de éxito
                    form.reset(); // Limpiar el formulario
                } else {
                    alert("Error: " + data); // Mostrar el error si ocurre
                }
            })
            .catch(error => {
                console.error("Error en fetch:", error);
                alert("Error de conexión con el servidor.");
            });
        });
});




    </script>
    </form>


</body>
</html>
