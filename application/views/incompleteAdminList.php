<div class="iq-card-body" id="incompleteList" style="display:none">
            <div class="table-responsive">
                <table id="Complete" class="data-tables table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                        <th></th>
                        <th>N° Dossier</th>
                        <th id="imComplete">Immatricule</th>
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
                        
                     <script>
                            


                          </script>
                        <?php
                        // var_dump($completeValidation);

                        foreach ($incompleteValidation as $validation){ 
                            // $id = $validation->id;
                            // $numDossier = $validation->numDossier;
                            // $immatricule = $validation->immatricule;
                            // $nom = $validation->NOM;
                            // $prenom = $validation->PRENOMS;
                            // $duDateVal = $validation->DuDateValidation;
                            // $auDateVal = $validation->AuDateValidation;
                            // $cas = $validation->Cas; 
                            // $typeBudget = $validation->typeBudget;
                            // $dateArrive = $validation->dateArrive;
                            // $comImmatricule = $validation->comptable;
                            // $comPrenom = $validation->prenom;
                        $id = $validation['id'];
                        $numDossier = $validation['numDossier'];
                        $immatricule = $validation['immatricule'];
                        $nom = $validation['NOM'];
                        $prenom = $validation['PRENOMS'];
                        $duDateVal = $validation['DuDateValidation'];
                        $auDateVal = $validation['AuDateValidation'];
                        $cas = $validation['Cas'];
                        $typeBudget = $validation['typeBudget'];
                        $dateArrive = $validation['dateArrive'];
                        $comImmatricule = $validation['comptable'];
                        $state = $validation['state'];
                        $comPrenom = $validation['prenom'];

                        $elemDate = explode("-", $dateArrive);
                        $dateArrives = implode("-", array_reverse($elemDate));
                        
                        
                        // if ($duDateVal == "" && $auDateVal == "") {
                        //     $statut = '<span class="badge badge-danger">En attente</span>';
                        // }
                        // else{
                        //     $statut = '<span class="badge badge-success">Traitée</span>';
                        // }
                        if ($state == "incomplete") {
                            $statut = '<span class="badge badge-warning">Anomalie</span>';
                        }
                        else if ($state == "treated") {
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
                            <a class="bg-secondary disabled" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" ><i class="ri-pencil-line"></i></a>                                
                            <a href="#'.$id.'" class="bg-secondary disabled"><i class="ri-delete-bin-line"></i></a>
                            </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            </div>