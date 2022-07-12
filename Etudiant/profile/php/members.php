<?php 
session_start();
if(isset( $_SESSION['id_compte']) && isset( $_SESSION['id_grp']) && isset( $_SESSION['code_enc']) ){
          include_once "../../../db_conn.php";
         try{
            $member="";
            // $code_enc =$_SESSION['code_enc'];
            $id_grp =$_SESSION['id_grp'];
            $sql ="SELECT * FROM etudiant WHERE id_grp =$id_grp";
            $result = $conn->query($sql);
            while($donnes = $result->fetch()){
                  $img_member ="../../Uploads/Images/Students_images/".$donnes['img_etd'];
                $member=' 
                
                <div class="col-sm-6 col-md-4 col-lg-3">
                                     <div class="card" style="border-radius: 15px; width:16rem">
                                            <div class="card-body text-center">
                                                    <div class="mt-3 mb-4">
                                                          <img src="'.$img_member.'"
                                                             class="rounded-circle img-fluid" style="width: 100px;" />
                                                   </div>
                                                  <h5 class="mb-2">'.$donnes['prenom_etd'].' '.$donnes['nom_etd'].'</h5>
                                                  <div class="info d-flex w-100 flex-column">
                                                           <div  id="cne" class="w-100 d-flex  ">
                                                              <p class="w-30" style="font-weight: 700;">cne   :</p>
                                                                <label class="w-70" for="fname" style="padding-left: 2rem;"> '.$donnes['cne'].' </label>
                                                            </div>
                
                                                    <div  id="apogee" class="w-100 d-flex ">
                                                          <p class="w-30" style="font-weight: 700;">apogee :</p>
                                                           <label class="w-70" for="fname" style="padding-left: 0.4rem;">'.$donnes['apogee'].' </label>
                                                     </div>
    
                                               <div  id="gmal" class="w-100 d-flex">
                                                         <p class="mw-30" style="font-weight: 700;">gmail:</p>
                                                         <label  for="fname" style="padding-left: 0.4rem;max-width: 83%;">'.$donnes['email_etd'].'</label>
                                                  </div>
    
                                             </div> 
                                       </div>
                                   </div>
                              </div>';
                              echo $member;

          }
      }catch(Exception $e) {
                die("Error: " . $e->getMessage());

            }
}
?>