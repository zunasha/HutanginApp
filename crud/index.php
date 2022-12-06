<?php
//error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
require_once 'core/PembuatKode.php';
require_once 'core/helper.php';
require_once 'core/process.php';

?>
<!doctype html>
<html>

<head>
    <title>IONIC Angular CRUD Generator</title>
    <link rel="stylesheet" href="core/bootstrap.min.css" />
    <link rel="icon" href="images/jenderal.jpeg" type="image/jpeg">
    <style>
        body {
            padding: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-white bg-success mb-3">
                        IONIC Angular Generator SideMenu
                    </div>
                    <div class="card-body">
                        <form action="index.php" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label style="font-weight: bold">Pilih Tabel - <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Refresh</a></label>
                                <select id="table_name" name="table_name" class="form-control" onchange="setname()">
                                    <option value="">Please Select</option>
                                    <?php
                                    $table_list = $PembuatKode->table_list();
                                    $table_list_selected = isset($_POST['table_name']) ? $_POST['table_name'] : '';
                                    foreach ($table_list as $table) {
                                    ?>
                                        <option value="<?php echo $table['table_name'] ?>" <?php echo $table_list_selected == $table['table_name'] ? 'selected="selected"' : ''; ?>><?php echo $table['table_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div style="display: none;">
                                <div class="form-group">
                                    <label style="font-weight: bold"> Nama Controller</label>
                                    <input type="text" id="controller" name="controller" value="<?php echo isset($_POST['controller']) ? $_POST['controller'] : '' ?>" class="form-control" placeholder="Controller Name" />
                                </div>
                                <div class="form-group">
                                    <label style="font-weight: bold"> Nama Model</label>
                                    <input type="text" id="model" name="model" value="<?php echo isset($_POST['model']) ? $_POST['model'] : '' ?>" class="form-control" placeholder="Model Name" />
                                </div>
                                <div class="form-group">
                                    <label style="font-weight: bold"> View Form</label>
                                    <input type="text" id="form" name="form" value="<?php echo isset($_POST['form']) ? $_POST['form'] : '' ?>" class="form-control" placeholder="View Form Name" />
                                </div>
                                <div class="form-group">
                                    <label style="font-weight: bold"> View List</label>
                                    <input type="text" id="list" name="list" value="<?php echo isset($_POST['list']) ? $_POST['list'] : '' ?>" class="form-control" placeholder="View List Name" />
                                </div>
                                <div class="form-group">
                                    <label style="font-weight: bold"> View Show</label>
                                    <input type="text" id="show" name="show" value="<?php echo isset($_POST['show']) ? $_POST['show'] : '' ?>" class="form-control" placeholder="View Show Name" />
                                </div>
                            </div>
                            <input type="submit" value="Generate" name="generate" class="btn btn-danger btn-block" onclick="javascript: return confirm('ini akan menimpa beberapa file anda, lanjutkan ?')" />
                        </form>
                        <hr>
                       
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-white bg-info mb-3">
                        Report
                    </div>
                    <div class="card-body">
                        <?php
                        foreach ($hasil as $h) {
                            echo '<p>' . $h . '</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function capitalize(s) {
            return s && s[0].toUpperCase() + s.slice(1);
        }

        function setname() {
            var table_name = document.getElementById('table_name').value.toLowerCase();
            if (table_name != '') {
                document.getElementById('controller').value = capitalize(table_name) + '';
                document.getElementById('model').value = capitalize(table_name);
                document.getElementById('form').value = 'create' + capitalize(table_name) + '.blade';
                document.getElementById('list').value = 'index' + capitalize(table_name) + '.blade';
                document.getElementById('show').value = 'show' + capitalize(table_name) + '.blade';

            } else {
                document.getElementById('controller').value = '';
                document.getElementById('model').value = '';
                document.getElementById('form').value = '';
                document.getElementById('list').value = '';
                document.getElementById('show').value = '';
            }
        }
    </script>
</body>

</html>