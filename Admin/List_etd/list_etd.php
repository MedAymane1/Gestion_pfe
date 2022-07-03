<div class="container">
    <div id="list-box">
        <h1 class="text-center text-primary">Students List</h1><hr><br>
        <div class="d-flex justify-content-between pb-4">
            <div>
                <button type="button" class="btn btn-primary me-4" onclick="getAddStudent()">
                    <i class="fa-solid fa-plus me-2"></i>Add a student
                </button>
                <a class="show_input_file1" onclick="getInputFile()">
                    Import an external list
                </a>
            </div>
            <div><!--  class="text-danger me-5" onclick="deleteAll()" -->
                <button type="button" class="btn btn-danger me-5" onclick="deleteAll()">
                <i class="fa-regular fa-trash-can me-2"></i><span>Delete all</span>
                </button>
            </div>
        </div>
        <div id="import-file-box" class="pb-4 d_none">
            <form onsubmit="event.preventDefault()">
                <div class="alert_area2">
                    <div class="alert alert-info alert-dismissable">
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong>
                                    Notice that the file must be of type Excel. The number and order of the columns must match the list below. The list header will be ignored.
                                </strong>
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
                    <input type="file"
                           name="excel"
                           id="import-file"
                           class="form-control w-50 me-5">
                    <button type="submit"
                            class="btn btn-primary"
                            value="btn" 
                            onclick="importFile(this.value)">
                        <i class="fa-solid fa-file-import me-2"></i>Import it
                    </button>
                </div>
            </form>
        </div>
        <div class="table_box1">
            <input type="text"
                id="search-etd"
                class=" search_etd1"
                onkeyup="searchStudent()"
                placeholder="Search for apogées....">
            <table id="data-etd" class="table table-hover">
                <!-- for the students list -->
            </table>
        </div>
    </div>
    <div id="add-stu-box" class="d_none add_stu_box">
        <!-- add new student space -->
    </div>
</div>
