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

var usernameInput = $("#name"); 
var nameSaveButton = $("#save-name");
var gradesTable = $("#grades");
var addAndContinue = $("#add-grade");
var addAndAverage = $("#calculate-average");

function uponNameSave () {
	$("#student-name").html(usernameInput.val());
	student.name = usernameInput.val();
	usernameInput.attr("disabled", true);
	nameSaveButton.attr("disabled", true);
	addAndContinue.removeAttr("disabled"); 
	addAndAverage.removeAttr("disabled");
}

function addSubjectsGrades (subject, grade) {
	subject = $("#subject").val();
	grade = $("#grade").val();
	student.addInfoToArray(subject, grade);
	$("#subject").val("");
	$("#grade").val("");
	putInfoInTable();
}

function putInfoInTable (subject, grade) {
	for (var i = 0; i < student.subjects.length; i++) {
	var tableRow = "<tr><td>" + student.subjects[i].title + "</td><td>" + student.subjects[i].grade + "</td></tr>"; 
	}
		gradesTable.html(tableRow + gradesTable.html());
}

function calculateAverage () {
	$("#student-average").html(student.calculateAverage().toFixed(2));
	if (student.isAwesome()) {
		$("#student-awesome").removeAttr("class");
	} else {
		$("#student-practice").removeAttr("class");
	}
	addAndContinue.attr("disabled", true);
	addAndAverage.attr("disabled", true);
}

nameSaveButton.on("click", uponNameSave);
addAndContinue.on("click", addSubjectsGrades);
addAndAverage.on("click", calculateAverage);