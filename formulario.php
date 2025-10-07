<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
  <form action="registra_dudas.php" method="post">
    <label for="email">Correo electrónico:</label>
    <input id="email" name="email" requiered>
    <p>Elija su módulo</p>
    <select id="modulo" name="modulo" requiered>
        <option disabled selected>Elige una opción</option>
        <option value="DEW">DEW</option>
        <option value="DOR">DOR</option>
        <option value="DPL">DPL</option>
        <option value="DSW">DSW</option>
        <option value="SOJ">SOJ</option>
        <option value="CL4">CL4</option>
        <option value="E1B">E1B</option>
        <option value="IPW">IPW</option>
    </select>
    <br><br>
    <label for="asunto">Asunto</label>
        <input id="asunto" name="asunto" type="text" required>
    <p>Descripción</p>
    <textarea id="descripcion" name="descripcion" rows="4" cols="40" requiered></textarea>
    <br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>