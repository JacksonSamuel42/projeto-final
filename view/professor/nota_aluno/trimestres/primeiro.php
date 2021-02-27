<?php 
    include __DIR__. "../../../code/gestorNotaDel.php";
?>

<div class="row">


    <div class="col-lg-3">
        <div class="doc-em-falta-container">
            <h3 class="semi-text-title">adicionar</h3>
            <div class="row doc-container">

                <div class="col-lg-12 content-doc-list-container remove">
                    <div class="content-doc-list content-doc-list-not-add houver-destaque">
                        <p class="doc-list-title">
                            <label title="Clique para adicionar" class="lbl_addDoc ">
                                Adicionar Nota
                                
                                <span class="float-right icon-hover" id="" 
                                    data-toggle="modal"
                                    data-target="#nota-add">
                                    <i class="fa fa-plus-circle"></i>
                                </span>
                            </label>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div style="overflow: auto;" class="doc-em-falta-container">
            <h3 class="semi-text-title">Disciplinas do Aluno</h3>
            <div style="height: 300px;" class="row doc-container">

                <div class="col-lg-12 content-doc-list-container remove">
                    <?php
                        foreach($res as $row){?>
                            <div class="content-doc-list content-doc-list-not-add houver-destaque">
                                <p class="doc-list-title">
                                    <label title="Clique para adicionar" class="lbl_addDoc ">
                                        <?= $row['nome']?>
                                        
                                        <span class="float-right icon-hover">
                                            <i class="fa fa-view"></i>
                                        </span>
                                    </label>
                                </p>
                            </div>
                        <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div style="overflow: auto;" class="doc-em-falta-container">
            <h3 class="mb-2 semi-text-title mb-4">Notas adicionadas(clique para editar)</h3>
             <?php
                $stmt = $pdo->prepare("SELECT * FROM boletim WHERE id_aluno = :id AND trimestre = 'I-trimestre' ORDER BY id_boletim DESC");
                $stmt->bindValue(":id", $id);
                $stmt->execute();
                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach($res as $row){?>
                    <div class="col-lg-12 content-doc-list-container fadeInLeft animated">
                        <div class="content-doc-list  houver-destaque">
                            <p class="doc-list-title">
                                <label class="lbl_addDoc ">
                                    Nota de <?= $row["disciplina"] ?> adicionada
                                    <span title="click para selecionar" class="float-right icon-hover p-2" 
                                        id="selecionar-nota">
                                        <a class="text-black" href="?id=<?= $id?>&bl=<?= $row["id_boletim"] ?>"><i class="fa fa-hand-pointer"></i></a>
                                    </span>
                                    <span title="click para editar" class="float-right icon-hover p-2" id="" 
                                    data-toggle="modal"
                                    data-target="#nota-edit">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    <span title="click para eliminar" data-target="#delete-users" data-toggle="modal" class="float-right icon-hover p-2" id="delete-nota">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </label>
                            </p>
                        </div>
                    </div>
                <?php
                }
                ?>



            <div class="row doc-container" id="displayDocs">
                
            </div>
        </div>
    </div>

</div>