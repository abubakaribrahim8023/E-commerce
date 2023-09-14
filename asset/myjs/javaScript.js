const modal = document.querySelector("#modal");
const modaling = document.querySelector("#modaling");

modaling.onclick = () => {
    modal.style.display = "block";

}

document.querySelector("#closeApplyModal").onclick = () => {
    modal.style.display = "none";
}



const closeAlert = document.querySelector("#closeAlert");
const alerted = document.querySelector(".alert");

closeAlert.onclick = () => {
    alerted.style.display = "none";
}


// login s cript


// edit course ajax 
function editCourseAjax(courseId) {
    // alert(courseId)
    const modalEdit = document.getElementById("modalEdit");
    modalEdit.style.display = "block";
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "edit_course.php?course_id=" + courseId, true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                modalEdit.innerHTML = xhr.response;
            }
        }
    }
    xhr.send();
}




function updateRecords() {
    const form = document.querySelector("#form");
    document.querySelector("#modalEdit").style.display = "none";

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "edit_course_changed.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("responss").innerHTML = xhr.response;
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

// delete course 

function deleteCourse(parents) {
    // alert(parents);

    const modalDelete = document.getElementById("modalDelete");
    modalDelete.style.display = "block";
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "delete_modal_course.php?course_id="+parents, true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                modalDelete.innerHTML = xhr.response;
            }
        }
    }
    xhr.send();
}

function deleteCourseModal(params) {
    const modalDelete = document.getElementById("modalDelete");
    modalDelete.style.display = "none";
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "delete_course.php?course_id="+params, true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("responss").innerHTML = xhr.response;
            }
        }
    }
    xhr.send();
}



function openApply(res){
    // alert(res); 
    // const modal = document.querySelector("#modal").style.display = "block";
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "coursesModal.php?course_id="+res, true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.querySelector("#display-modal").innerHTML = xhr.response;
            }
        }
    }
    xhr.send();
}

function registerCourseUsers(){
    const form = document.querySelector("#courseData");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "insert_courses.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                alert(xhr.response);
                document.querySelector("#display-modal").style.display = "none";
            }
        }
    }
    let data = new FormData(form);
    xhr.send(data);
    
}


