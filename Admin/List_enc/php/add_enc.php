<div class="container">
    <form class="row g-3" onsubmit="event.preventDefault()">
        <h1 class="text-primary text-center">Add a new supervisor</h1>
        <hr>
        <div id="alert_area_enc" class="d_none">
            <!-- Error alerts space -->
        </div>
        <div class="col-12">
            <label for="code" class="label_field">Supervisor Code</label>
            <input type="text" class="form-control" id="code" name="code">
        </div>
    
        <div class="col-12">
            <label for="nom" class="label_field">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom">
        </div>
    
        <div class="col-12">
            <label for="prenom" class="label_field">Prenom</label>
            <input type="text" class="form-control" id="prenom" name="prenom">
        </div>
        
        <div class="col-12 d-flex justify-content-end">
            <button type="button"
                    class="btn btn-secondary mt-2 btn2"
                    onclick="cancelAddSup()">Cancel</button>
            <button type="submit"
                    class="btn btn-primary ms-4 mt-2 btn2"
                    value="addEtd" 
                    onclick="addSupervisor(this.value)">Add to list</button>
        </div>
    </form>
</div>
