<?php
require('session.php');
//require_once('update/searchupdate.php');
?>

<!DOCTYPE html>
<html ng-app="myApp" lang="pt">
<head>
    <title>Mecanico - Adicionar Reparo</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="Lakeside Books">
    <meta name="keywords" content="livros, lakeside, cork, loja, online">

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

</head>

<body id="top" style="font-size: 62.5%;">
<!-- INÍCIO Cabeçalho -->
<header id="header-wrapper">

    <div id="top-bar" class="clearfix">

        <div id="top-bar-inner">

            <!-- Barra de Pesquisa por http://www.paulund.co.uk/create-a-slide-out-search-box -->
            <div class="search_form">
                <form action="customer-search.php" method="post">
                    <input type="text" name="search_box" id="search_box" placeholder="Procurar por um cliente...">
                </form>
            </div>
            <!-- Barra de Pesquisa por http://www.paulund.co.uk/create-a-slide-out-search-box -->


            <div class="topbar-right clearfix">

                <ul class="clearfix">
                    <li class="login-user">
                        <a title="<?php echo $login_session; ?>" href="#">
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
                <a href="repairs.php">
							<span class="icon">
								<i aria-hidden="true" class="icon-hammer"></i>
							</span>
                    <span>Reparos</span>
                </a>
            </li>
            <li>
                <a href="#">
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
                    <a>
            </li>
            <li>
                <a href="#">
							<span class="icon">
								<i aria-hidden="true" class="icon-coin"></i>
							</span>
                    <span>Faturas</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- FIM DA NAVEGAÇÃO -->


    <!--Breadcrumb -->
    <div class="bread">
        <div class="submenu">
            <ul>
                <li id="back"><a href="##" onClick="history.go(-1); return false;">Voltar</a></li>

            </ul>
        </div>
        <h3><a style="text-decoration: none;" href="repairs.php">Reparos</a></h3> <span style="font-size: 1.2em; font-weight: 500">\ Adicionar Reparo</span>
    </div>
    <!--Breadcrumb -->


    <div class="floats">
        <div class=" full-widget">
            <div ng-controller="customerCrtl">

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
                    <div class="col-md-3">Filtrar:
                        <input type="text" ng-model="search" ng-change="filter()" placeholder="Filtrar" class="form-control" />
                    </div>
                    <div class="col-md-4">
                        <p>Filtrados {{ filtered.length }} de {{ totalItems}} clientes totais</p>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-12" ng-show="filteredItems > 0">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>ID&nbsp;<a ng-click="sort_by('cust_id');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Nome&nbsp;<a ng-click="sort_by('forename');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Sobrenome&nbsp;<a ng-click="sort_by('surname');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Cidade&nbsp;<a ng-click="sort_by('town');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>País&nbsp;<a ng-click="sort_by('county');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Telefone&nbsp;<a ng-click="sort_by('tel');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            </thead>
                            <tbody>
                            <tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                                <td>{{data.cust_id}}</td>
                                <td>{{data.forename}}</td>
                                <td>{{data.surname}}</td>
                                <td>{{data.town}}</td>
                                <td>{{data.county}}</td>
                                <td>{{data.tel}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12" ng-show="filteredItems == 0">
                        <div class="col-md-12">
                            <h4>Nenhum cliente encontrado</h4>
                        </div>
                    </div>
                    <div class="col-md-12" ng-show="filteredItems > 0">
                        <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>

                    </div>
                </div>

            </div>
            <!-- FIM DA LISTA DE CLIENTES-->

            <div>
                <form class="form-4" method="post" action="addRepairForm.php">
                    <p>Digite o ID do Cliente para Prosseguir com o Reparo:</p> <br>
                    <input type="number" name="record" placeholder="Digite o número do ID, por exemplo, 1" min="1" maxlength="10" required>
                    <input type="submit" name="go" value="Ir para o formulário de reparo >>">
                </form>
            </div>

        </div>
        <!-- FIM DO WIDGET COMPLETO-->


    </div>
    <!-- FIM DOS FLOATS-->
</div>
<!-- FIM DO MAIN-->

<!-- SCRIPT PARA O MENU -->
<script src="js/menu.js"></script>
<!-- SCRIPT PARA O MENU -->
<script src="js/angular.min.customer.js"></script>
<script src="js/ui-bootstrap-tpls-0.10.0.min.customer.js"></script>
<script src="app/customer.js"></script>

</body>

</html>
