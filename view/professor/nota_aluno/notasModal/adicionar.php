<?php
	$stmt = $pdo->prepare("SELECT * FROM tipo_disciplina WHERE classe = :classe
    AND curso = :curso");
    $stmt->bindValue(':classe', $data['classe']);
    $stmt->bindValue(':curso', $data['curso']);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if($resCount >= $countDisciplina) $displayTrimestres2 = '';
    else $displayTrimestres2 = 'd-none'
?>

<div class="modal fade" id="nota-add">

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" style="color:#1c1c1c">Notas Boletim Aluno</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<form enctype='multipart/form-data' method="POST" id="">
							
							<div id="msg"></div>
							<div class="row p-20">
								<div class="form-group col-lg-6 col-sm-6 d-none">
									<label class="col-form-label">id</label>
									<input disabled type="number" value="<?= $id?>" id="id-aluno" name="id-aluno"
										class="form-control"  />
								</div>
								<div class="form-group col-lg-6 col-sm-6">
									<label class="col-form-label">Disciplina</label>
									<select class="form-control" id="disciplina" name="pagamento_servico"
										required>
										<option value="" disabled>Selecionar</option>
										<?php
											foreach($res as $row){?>
												<option value="<?= $row['nome']?>"><?= $row['nome']?></option>
											<?php
											}
										?>
									</select>
								</div>
								
								<div class="form-group col-lg-6 col-sm-6">
									<label class="col-form-label">Primeira Nota</label>
									<input type="number" id="nota1" name="nota1" placeholder="nota"
										class="form-control" required />
								</div>
								<div class="form-group col-lg-6 col-sm-6">
									<label class="col-form-label">Segunda Nota</label>
									<input type="number" id="nota2" name="nota2"
										placeholder="nota" class="form-control" required />
								</div>
								<div class="form-group col-lg-6 col-sm-6">
									<label class="col-form-label">Terceira Nota</label>
									<input type="number" id="nota3" name="nota3"
									placeholder="nota" class="form-control" required />
								</div>
								<div class="form-group col-lg-6 col-sm-6">
									<label class="col-form-label">Data</label>
									<input type="date" id="data-nota" name="data-nota"
										placeholder="data" class="form-control" required />
								</div>
								<div class="form-group col-lg-6 col-sm-6">
									<label class="col-form-label">Trimestre</label>
									<select required id="trimestre-nota" class="form-control" name="trimestre-nota">
										<option value="I-trimestre">I-Trimestre</option>
										<option class="<?= $displayTrimestres2?>" value="II-trimestre">II-Trimestre</option>
										<option class="<?= $displayTrimestres3?>" value="III-trimestre">III-Trimestre</option>
									</select>
								</div>

								<div class="form-group col-lg-12 col-sm-6">
									<hr>
									<button class="btn btn-primary" id="adicionar-nota" type="submit"
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