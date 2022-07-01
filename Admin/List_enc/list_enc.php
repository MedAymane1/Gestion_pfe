<div class="container">
    <div id="">
        <h1 class="text-center text-primary">Students List</h1><hr><br>
        <div class="py-3">
            <button type="submit" class="btn btn-primary me-4">
                <i class="fa-solid fa-plus me-2"></i>Add a student
            </button>
            <a class="show_input_file1" onclick="getInputFile()">
                Import an external list
            </a>
        </div>
        <div id="import-file-box" class="py-4 d_none">
            <form class="">
                <div class="alert_area2">
                    <div class="alert alert-info alert-dismissable">
                        <div class="d-flex justify-content-between">
                            <div>
                                Notice that the file must be of type Excel. The number and 
                                order of the columns must match the list below
                            </div>
                            <button type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert"
                                    aria-label="Close">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <label for="import-file" class="file_label1">
                        <i class="bx bx-cloud-upload me-2 fs-4"></i>
                        <span>Choose file</span>
                    </label>
                    <input type="file" name="excel" id="import-file" class="d-none">
                    <button type="button" class="btn btn-success ms-5" onclick="">
                        <i class="fa-solid fa-file-import me-2"></i>Import it
                    </button>
                </div>
            </form>
        </div>
        <input type="text"
            id="search-etd"
            class="form-control search_etd1"
            onkeyup="searchStudent()"
            placeholder="Search for apogées....">
            
        <div class="overflow-auto">
            <table id="data-etd" class="table table-striped table-hover">
                <!-- for the students list -->
            </table>
        </div>
    </div>
</div>

