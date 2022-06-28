<section class="contener_uploads">
        <!-- drop down file or folder  -->
        <div class="upload drop_space">
            <div class="upload_folder">
                <div class="wrapper_F_f">
                    <header>Upload Folder</header>
                    <form method="get" id="form-folder">    
                      <input class="input-folder" type="file" name="files[]" multiple="" directory="" webkitdirectory="" mozdirectory="" hidden>
                      <i class="fas fa-cloud-upload-alt"></i>
                      <p>Browse Folder to Upload</p>
                    </form>
                    <!-- <section class="progress-area"></section>
                    <section class="uploaded-area"></section> -->
                  </div>
            </div>
            <div class="upload-file">
                <div class="wrapper_F_f">
                    <header>Upload File</header>
                    <form action="#" id="form-file">
                      <input class="file-input-file" type="file" name="file" hidden>
                      <i class="fas fa-cloud-upload-alt"></i>
                      <p>Browse File to Upload</p>
                    </form>
                    <!-- <section class="progress-area"></section>
                    <section class="uploaded-area"></section> -->
                  </div>
            </div>
        </div>

        <!-- space for uploaded folders -->
        <div class="space_folder">
            <div class="title">
              <p>Folders uploaded</p>
            </div>
            <div class="uploded_folders_space schow "  id="folder_uploaded_space">
              <!-- folder space -->
            </div>
        </div>
        <!--space for uploaded folders   -->
        <div class="space_file">
            <div class="title">
                <p>Files uploaded</p>
            </div>
            <div class="uploded_files_space schow " id="uploded_files_space">
            
            </div>
        </div>
    </section>   