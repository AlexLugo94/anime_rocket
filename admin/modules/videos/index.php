<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>VIDEOS</title>
</head>
<body>
    <div id="sideBarContainer">
        <?php require_once '../../inside.html'; ?>
    </div>
    <main id="main" class="main">
        <div class="header">
        <div class="left">
                <div value="Rotate" id="img_container">
                    <a href="javascript:void(0)" onclick="showHideSideBar()">
                        <i class="fa-sharp fa-solid fa-chevron-left" id="image"></i>
                    </a>
                </div>
                <h2>Videos</h2>
            </div>
            <div class= actions>
                <a href="#" class="btnaction" id="refresh"><i class="fa-solid fa-rotate-right"></i> Regresar</a>
                <a href="#" class="btnaction" id="btnNew"><i class="fa-solid fa-plus"></i> Nuevo</a>
                <a href="#" class="btnaction" id="btnBorrar"><i class="fa-solid fa-trash"></i> Borrar</a>            </div>
        </div>
        <section id="data" class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" id="SelectAll">
                        </th>
                        <th> Capitulo</th>
                        <th> Thumbnail</th>
                        <th> Categoria</th>
                        <th> Anime</th>
                        <th> Fecha Insertada</th>
                        <th> Fecha Publicada</th>
                        <th> Orden</th>
                        <th> Status</th>
                        <th> Editar</th>
                    </tr>
                </thead>
                <tbody id="cuerpo"></tbody>
            </table>
        </section>
        <section id="insert_data">
            <div class="container">
                <form action="consultav.php" method="POST" id="form">
                    <div class="row mt-5">
                        <div class="col-6">
                            <label for="capitulo" class="form-label">Capitulo</label>
                            <input type="text" class="form-control" name="capitulo" id="capitulo">
                        </div>
                        <div class="col-6">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="text" class="form-control" name="foto" id="foto">
                        </div>
                        <div class="col-6">
                            <label for="video" class="form-label">Video</label>
                            <input type="text" class="form-control" name="video" id="video">
                        </div>
                        <div class="col-6">
                            <label for="categoria" class="form-label">Categoria</label>
                            <input type="text" class="form-control" name="categoria" id="categoria">
                        </div>
                        <div class="col-6">
                            <label for="anime" class="form-label">Anime</label>
                            <input type="text" class="form-control" name="anime" id="anime">
                        </div>
                        <div class="col-6">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" name="status" id="statuses">
                        </div>
                        <div class="col-6">
                            <label for="fechai" class="form-label">Fecha Insertado</label>
                            <input type="date" class="form-control" name="fechai" id="fecha_insertada">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="fechap" class="form-label">Fecha Publicada</label>
                            <input type="varchar" class="form-control" name="fechap" id="fecha_publicada">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success" id="btnSave">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script src="../../js/videos.js"></script>
    <script src="../../js/sidebar.js"></script>
</body>

</html>