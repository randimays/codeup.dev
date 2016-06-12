
var student = {
		awesomeGrade: 80,
		name: null,
		subjects: [],
		addInfoToArray: function(subject, grade) {
			var subject = {
				title: subject,
				grade: grade
			}
			this.subjects.push(subject);
		},
		calculateAverage: function(sum) {
			 var average = 0;
        	this.subjects.forEach(function (subject) {
            average = average + parseInt(subject.grade);
        	});
        	return average / this.subjects.length;
		},
		isAwesome: function () {
			return this.calculateAverage() > this.awesomeGrade;
		}
	};

var usernameInput = document.forms.username.name; 
var studentLabel = document.querySelector("#student-name"); 
var nameSaveButton = document.querySelector("#save-name");
var gradesTable = document.querySelector("#grades");
var addAndContinue = document.querySelector("#add-grade");
var addAndAverage = document.querySelector("#calculate-average");
var averageCell;
var tableRow;

function uponNameSave () {
	studentLabel.innerHTML = usernameInput.value;
	student.name = usernameInput.value;
	usernameInput.disabled = true;
	nameSaveButton.disabled = true;
	addAndContinue.disabled = false;
	addAndAverage.disabled = false;
}

function addSubjectsGrades (subject, grade) {
	subject = (document.forms.info.subject).value;
	grade = (document.forms.info.grade).value;
	student.addInfoToArray(subject, grade);
	(document.forms.info.subject).value = '';
	(document.forms.info.grade).value = '';
	putInfoInTable();
}

function putInfoInTable (subject, grade) {
	for (var i = 0; i < student.subjects.length; i++) {
	tableRow = "<tr><td>" + student.subjects[i].title + "</td><td>" + student.subjects[i].grade + "</td></tr>"; 
	}
		gradesTable.innerHTML = tableRow + gradesTable.innerHTML;
}

function calculateAverage () {
	averageCell = document.querySelector("#student-average");
	averageCell.innerHTML = student.calculateAverage();
	if (student.isAwesome()) {
		document.getElementById("student-awesome").removeAttribute("class");
		document.getElementById("student-practice").setAttribute("class", "hidden");
	} else {
		document.getElementById("student-practice").removeAttribute("class");
		document.getElementById("student-awesome").setAttribute("class", "hidden");
	}

	addAndContinue.setAttribute("disabled", true);
	addAndAverage.setAttribute("disabled", true);
}

nameSaveButton.addEventListener("click", uponNameSave);
addAndContinue.addEventListener("click", addSubjectsGrades);
addAndAverage.addEventListener("click", calculateAverage);