<div class="iq-card-body" id="pendingList" style="display:none">
            <div class="table-responsive">
                <table id="Pending" class="data-tables table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                        <th></th>
                        <th>N°Dossier</th>
                        <th id="imPendig">Immatricule</th>
                        <th>Nom et Prenom</th>
                        <th>Cas</th>
                        <th>Budget</th>
                        <th>Date Arrivée</th>
                        <th>Traité par</th>
                        <th>Status</th>
                        <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pendingValidation as $validation){ 
                            $id = $validation->id;
                            $numDossier = $validation->numDossier;
                        $immatricule = $validation->immatricule;
                        $nom = $validation->NOM;
                        $prenom = $validation->PRENOMS;
                        $duDateVal = $validation->DuDateValidation;
                        $auDateVal = $validation->AuDateValidation;
                        $cas = $validation->Cas; 
                        $typeBudget = $validation->typeBudget;
                        $dateArrive = $validation->dateArrive;
                        $comImmatricule = $validation->comptable;
                        $comPrenom = $validation->prenom;

                        $elemDate = explode("-", $dateArrive);
                        $dateArrives = implode("-", array_reverse($elemDate));

                        if ($duDateVal == "" && $auDateVal == "") {
                            $statut = '<span class="badge badge-danger">En attente</span>';
                        }
                        else{
                            $statut = '<span class="badge badge-success">Traitée</span>';
                        }
                        
                        ?>
                        <tr id="line-delete-<?php echo $id; ?>">
                        <td></td>
                        <td><?php echo $numDossier; ?></td>
                            <td><?php echo $immatricule; ?></td>
                            <td><?php echo $nom.' '.$prenom; ?></td>
                            <td>
                            <p class="mb-0"><?php echo $cas; ?></p>
                            </td>
                            <td>
                            <p class="mb-0"><?php echo $typeBudget; ?></p>
                            </td>
                            <td>
                            <p class="mb-0"><?php echo $dateArrives; ?></p>
                            </td>
                            <td>
                            <p class="mb-0"><?php echo $comPrenom; ?></p>
                            </td>
                            <td>
                            <p class="mb-0"><?php echo $statut; ?></p>
                            </td>
                            <td>
                            <div class="flex align-items-center list-user-action">
                            <a  href="#modal-edit2-<?php echo $id ?>" class="bg-primary" data-toggle="modal" data-placement="top" title="" data-original-title="Edit"><i class="ri-pencil-line"></i></a>                                
                            <a href="#myModal2<?php echo $id ?>" class="bg-primary" data-id="'.$id.'" data-toggle="modal" data-original-title="Supprimer"><i class="ri-delete-bin-line"></i></a>                            </div>
                            </td>
                        </tr>

                        <div id="modal-edit2-<?php echo $id; ?>" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header flex-column">
                                        <div class="icon-box">
                                            <i class="fa fa-times"></i>
                                        </div>
                                        <h4 class="modal-title w-100">Comptable</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="edit-comptable-form" >
                                            <select class="custom-select" id="select-id" name="comptableId" required>
                                                <option value="">Sélectioné le comptable</option>
                                                <?php 
                                                $prenomsArray = array();
                                                foreach ($comptable as $comptab){ 
                                                    $imat = $comptab->imUser; 
                                                    $prenom = $comptab->prenom; 
                                                    $prenomsArray[$imat] = $prenom;
                                                ?>
                                                <option value="<?php echo $imat; ?>" <?php echo ($comImmatricule == $imat) ? "selected" : ""; ?>> <?php echo $prenom; ?></option>
                                                <?php } ?>
                                            </select>
                                            <input type="hidden" name="prenoms" value="<?php echo isset($prenomsArray[$comImmatricule]) ? $prenomsArray[$comImmatricule] : ''; ?>">
                                        
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annuler</button>
                                            <input type="hidden" id="idnum"  name="id" value="<?php echo $id; ?>">
                                            <button type="submit" class="btn btn-success">Valider</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="myModal2<?php echo $id; ?>" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header flex-column">
                                        <div class="icon-box">
                                            <i class="fa fa-times"></i>
                                        </div>
                                        <h4 class="modal-title w-100">Confirmation</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Voullez-vous la supprimer ?</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NON</button>
                                        <form id="delete-validation-form">

                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <button type="submit" class="btn btn-danger">OUI</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
            </div>