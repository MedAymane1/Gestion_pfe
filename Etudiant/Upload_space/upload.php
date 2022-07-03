<section class="contener_uploads">
        <!-- drop down file or folder  -->
        <div class="upload drop_space">
            <div class="upload_folder">
                <div class="wrapper_F_f"style="height: 44vh;margin-top: -16px;">
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
                <div class="wrapper_F_f" style="height: 43vh">
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
        <div class="space_folder" style="margin-top: -2px;height: 88vh;">
            <div class="title">
              <p style="margin-top: 12px;">Folders uploaded</p>
            </div>
            <div class="uploded_folders_space schow "  id="folder_uploaded_space">
              <!-- folder space -->
            </div>
        </div>
        <!--space for uploaded folders   -->
        <div class="space_file" style="margin-top: -2px;height: 88vh;">
            <div class="title">
                <p style="margin-top: 12px;">Files uploaded</p>
            </div>
            <div class="uploded_files_space schow " id="uploded_files_space">
            
            </div>
        </div>
    </section>   