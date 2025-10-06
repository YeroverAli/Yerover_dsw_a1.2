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
    <input id="email" name="email" type="email" requiered>
    <p>Elija su módulo</p>
    <select id="modulo" name="modulo" requiered>
        <option value="dew">dew</option>
        <option value="dor">dor</option>
        <option value="dpl">dpl</option>
        <option value="dsw">dsw</option>
        <option value="soj">soj</option>
        <option value="cl4">cl4</option>
        <option value="e1b">e1b</option>
        <option value="ipw">ipw</option>
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