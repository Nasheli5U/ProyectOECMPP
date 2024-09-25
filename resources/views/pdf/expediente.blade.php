<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }
        h1, h2 {
            text-align: center;
            margin: 0;
        }
        h1 {
            font-size: 24px;
            margin-top: 20px;
        }
        h2 {
            font-size: 20px;
            margin-bottom: 40px;
        }
        p {
            font-size: 18px;
            margin: 20px 0;
            padding-left: 20px;
        }
        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
<img src="https://myfiles.space/user_files/237778_86595cc446756af9/237778_custom_files/img1726754278.jpeg" width="315" height="149">

    <h1>Municipalidad de Puno</h1>
    <h2>Oficina de Ejecución Coactiva</h2>
    
    <p><strong>Expediente N°:</strong> {{ $expediente->numero }}</p>
    <p><strong>Obligado:</strong> {{ $persona->nombre }} {{ $persona->apellido }}</p>
    <p><strong>Monto de la Infracción:</strong> S/. {{ $infraccion->monto }}</p>
    <p><strong>Medida Complementaria:</strong> {{ $expediente->medida_complementaria }}</p>
    <p><strong>Procedencia:</strong> {{ $procedencia->nombre }}</p>
</body>
</html>
