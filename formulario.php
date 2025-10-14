<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" author="YeroverAli">
    <title>Formulario</title>
</head>
<body>
  <form action="registra_dudas.php" method="post">
    <label for="email">Correo electrónico:</label><br>
    <input id="email" name="email" required>
    <p>Elija su módulo</p>
    <select id="modulo" name="modulo" required>
        <option disabled selected>Elige una opción:</option>
        <option value="DEW">DEW</option>
        <option value="DOR">DOR</option>
        <option value="DPL">DPL</option>
        <option value="DSW">DSW</option>
        <option value="SOJ">SOJ</option>
        <option value="CL4">CL4</option>
        <option value="E1B">E1B</option>
        <option value="IPW">IPW</option>
    </select>
    <br>
    <p>Temas relacionados:</p>
    <label><input type="checkbox" name="temas[]" value="Linux"> Linux</label>
    <label><input type="checkbox" name="temas[]" value="Windows"> Windows</label>
    <label><input type="checkbox" name="temas[]" value="PHP"> PHP</label>
    <label><input type="checkbox" name="temas[]" value="HTML"> HTML</label>
    <label><input type="checkbox" name="temas[]" value="Javascript"> Javascript</label>
    <label><input type="checkbox" name="temas[]" value="Bash"> Bash</label>
    <label><input type="checkbox" name="temas[]" value="Calificaciones"> Calificaciones</label>
    <label><input type="checkbox" name="temas[]" value="Actividades"> Actividades</label>
    <label><input type="checkbox" name="temas[]" value="Exámenes"> Exámenes</label>
    <label><input type="checkbox" name="temas[]" value="Otros"> Otros</label>
    <br><br>
    <label for="asunto">Asunto:</label>
    <br>
    <input id="asunto" name="asunto" type="text" required>
    <p>Descripción</p>
    <textarea id="descripcion" name="descripcion" rows="4" cols="40" required></textarea>
    <br><br>
    <button type="submit">Enviar</button>
  </form>
</body>
</html>