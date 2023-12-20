<?php
require('session.php');
?>

<!DOCTYPE html>
<html ng-app="myApp" lang="pt">
<head>
    <title>Mecanico - Reparos</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="Mecanico - Reparos">
    <meta name="keywords" content="reparos, soluções, PC, loja, online">

    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/global.css">

    <link rel="stylesheet" href="css/menu.css" />
    <script src="js/modernizr.custom.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        ul>li, a{cursor: pointer;}
    </style>

    <style>@import url(http://fonts.googleapis.com/css?family=Raleway:400,700); </style>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>

</head>

<body id="top" style="font-size: 62.5%;">
<!-- INÍCIO Cabeçalho -->
<header id="header-wrapper">

    <div id="top-bar" class="clearfix">

        <div id="top-bar-inner">

            <!-- Barra de Pesquisa por http://www.paulund.co.uk/create-a-slide-out-search-box -->
            <div class="search_form">
                <form action="customer-search.php" method="post">
                    <input type="text" name="search_box" id="search_box" placeholder="Pesquisar por um cliente...">
                </form>
            </div>
            <!-- Barra de Pesquisa por http://www.paulund.co.uk/create-a-slide-out-search-box -->


            <div class="topbar-right clearfix">

                <ul class="clearfix">
                    <li class="login-user">
                        <a title="<?php echo $login_session; ?>" href="account.php">
                            <span class="icon"><i aria-hidden="true" class="icon-user"></i></span>
                            <?php echo $login_session; ?>
                        </a>
                    </li>
                </ul>

                <div class="log-out">
                    <!-- <p><a title="Sign out" href="#">Sign out</a></p> -->
                    <p>
                        <a href="logout.php" title="Sair">
                            <span>Sair</span>
                            <span class="icon">
										<i aria-hidden="true" class="icon-exit"></i>
									</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="full-shadow"></div>


</header>
<!-- FIM Cabeçalho -->


<div class="main clearfix">

    <!-- INÍCIO DA NAVEGAÇÃO -->
    <nav id="menu" class="nav">
        <ul>
            <li>
                <a href="dashboard.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-home"></i>
							</span>
                    <span>Início</span>
                </a>
            </li>
            <li>
                <a href="customer.php">
							<span class="icon"> 
								<i aria-hidden="true" class="icon-users"></i>
							</span>
                    <span>Clientes</span>
                </a>
            </li>
            <li class="active">
                <a href="#">
							<span class="icon">
								<i aria-hidden="true" class="icon-hammer"></i>
							</span>
                    <span>Reparos</span>
                </a>
            </li>
            <li>
                <a href="estimates.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-sigma"></i>
							</span>
                    <span>Orçamentos</span>
                </a>
            </li>
            <li>
                <a href="inventory.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-barcode"></i>
							</span>
                    <span>Inventário</span>
                </a>
            </li>
            <li>
                <a href="account.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-user"></i>
							</span>
                    <span>Conta</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- FIM DA NAVEGAÇÃO -->


    <!--Breadcrumb -->
    <div class="bread">
        <div class="submenu">
            <ul>
                <li id="update" value="Atualizar Reparo">Atualizar Reparo</li>
                <li id="add"><a href="addRepair.php">Adicionar Reparo</a></li>
            </ul>
        </div>
        <h3>Reparos</h3>
    </div>
    <!--Breadcrumb -->


    <div class="floats">
        <div class="full-widget" id="searchDiv" style="display:none;">

            <form class="form-4" method="post" action="updateRepair.php">
                <p>Digite o número do ID do reparo:</p> <br>
                <input type="number" name="record" placeholder="Digite o número do ID, por exemplo, 1" min="1" maxlength="10" required>
                <input type="submit" name="go" value="Ir para atualização >>">
            </form>

        </div>

        <div class=" full-widget">
            <div ng-controller="repairsCrtl">

                <div class="row">
                    <div class="col-md-2">Tamanho da Página:
                        <select ng-model="entryLimit" class="form-control">
                            <option>5</option>
                            <option>10</option>
                            <option>20</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                    </div>
                    <div class="col-md-3">Filtro:
                        <input type="text" ng-model="search" ng-change="filter()" placeholder="Filtrar" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <br><br><p>Filtrados {{ filtered.length }} de {{ totalItems

                            }} reparos totais</p>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-12" ng-show="filteredItems > 0">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>ID&nbsp;<a ng-click="sort_by('rep_id');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Descrição&nbsp;<a ng-click="sort_by('description');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Modelo&nbsp;<a ng-click="sort_by('model');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Data de Adição&nbsp;<a ng-click="sort_by('repairdate');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Data de Atualização&nbsp;<a ng-click="sort_by('collectiondate');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Status&nbsp;<a ng-click="sort_by('status');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            </thead>
                            <tbody>
                            <tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                                <td>{{data.rep_id}}</td>
                                <td>{{data.description}}</td>
                                <td>{{data.model}}</td>
                                <td>{{data.repairdate}}</td>
                                <td>{{data.collectiondate}}</td>
                                <td>{{data.status}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12" ng-show="filteredItems == 0">
                        <div class="col-md-12">
                            <h4>Nenhum reparo encontrado</h4>
                        </div>
                    </div>
                    <div class="col-md-12" ng-show="filteredItems > 0">
                        <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>

                    </div>
                </div>

            </div>
            <!-- FIM DA LISTA DE REPAROS -->
        </div>
        <!-- FIM DO WIDGET COMPLETO-->

    </div>
    <!-- FIM DE FLOATS-->
</div>
<!-- FIM DA MAIN-->

<!-- SCRIPT PARA O MENU -->
<script src="js/menu.js"></script>
<!-- SCRIPT PARA O MENU -->
<script src="js/angular.min.repair.js"></script>
<script src="js/ui-bootstrap-tpls-0.10.0.min.repair.js"></script>
<script src="app/repair.js"></script>

<script>
    function showDiv() {
        document.getElementById('searchDiv').style.display = "block";
    }

    $( "#update" ).click(function() {
        $( "#searchDiv" ).toggle( "slow", function() {
            // Animação completa.
        });
    });
</script>

</body>

</html>
