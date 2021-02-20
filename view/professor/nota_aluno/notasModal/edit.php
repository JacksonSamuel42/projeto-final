
<?php
	$idB = filter_input(INPUT_GET ,'bl', FILTER_SANITIZE_NUMBER_INT);
	$stmt = $pdo->prepare("SELECT * FROM boletim WHERE id_boletim = :id");
	$stmt->bindValue(":id", $idB);
	$stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php
	$stmt = $pdo->prepare("SELECT * FROM tipo_disciplina WHERE classe = 10 
    AND curso = 'informatica'");
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>




<div class="modal fade" id="nota-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" style="color:#1c1c1c">Editar Notas</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<form action="" enctype='multipart/form-data' method="POST" id="">
						<div id="msgEdit"></div>
							<div class="row p-20">
								<!-- {{csrf_field()}} -->
								<!-- <input type="hidden" name="pagamento_candidato" value="{{$candidato->id}}" class="form-control" required/> -->
								<div class="form-group col-lg-6 col-sm-6">
									<label class="col-form-label">Disciplina</label>
									<select class="form-control" id="disciplina-update" name=""
										required>
										<option value="<?= $data['disciplina']?>"><?= $data['disciplina']?></option>
										<?php
											foreach($res as $row){?>
												<option value="<?= $row["nome"]?>"><?= $row["nome"]?></option>
											<?php
											}
										?>
									</select>
								</div>

								<input id="id-boletim" type="hidden" value="<?= $idB?>">

								<div class="form-group col-lg-6 col-sm-6 d-none">
									<label class="col-form-label">id</label>
									<input disabled type="number" value="<?= $data['id_aluno']?>" id="id-aluno-update" name="id-aluno"
										class="form-control"  />
								</div>
								
								<div class="form-group col-lg-6 col-sm-6">
									<label class="col-form-label">Primeira Nota</label>
									<input type="number" value="<?= $data["nota1"]?>" id="nota1-update" name="nota1" placeholder="nota"
										class="form-control" required />
								</div>
								<div class="form-group col-lg-6 col-sm-6">
									<label class="col-form-label">Segunda Nota</label>
									<input type="number" id="nota2-update" name="nota2" value="<?= $data["nota2"]?>" 
										placeholder="nota" class="form-control" required />
								</div>
								<div class="form-group col-lg-6 col-sm-6">
									<label class="col-form-label">Terceira Nota</label>
									<input type="number" id="nota3-update" name="nota3"value="<?= $data["nota3"]?>" 
									placeholder="nota" class="form-control" required />
								</div>
								<div class="form-group col-lg-6 col-sm-6">
									<label class="col-form-label">Data</label>
									<input type="date" id="data-nota-update" name="data-nota" value="<?= $data["data"]?>" 
										placeholder="nota"class="form-control" required />
								</div>
								<div class="form-group col-lg-6 col-sm-6">
									<label class="col-form-label">Trimestre</label>
									<input disabled type="text" value="<?= $data["trimestre"]?>"  id="trimestre-nota-update" name="media-nota"
										placeholder="1-trimestre"class="form-control" required />
								</div>

								<div class="form-group col-lg-12 col-sm-6">
									<hr>
									<button class="btn btn-primary" id="edit-nota" type="submit"
										style="width:100%;padding:10px;font-size:14px">
										Adicionar <i class="fa fa-plus-circle"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>