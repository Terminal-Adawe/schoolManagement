/*
  TABLE CODES

  1 - Class
  2 - Course
  3 - Subject
  4 - Staff
*/


function implementAction(code, action, record){
    jQuery.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
          });

        

          var formData = {"code" : code,"action" : action, "record" : record};

          //console.log('about to send '+formData.code+" to check code");

          jQuery.ajax({
            url: '/action',
            type: 'POST',
            data:formData,
            dataType    : 'text',
                error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
      }
            })
          .done(function(data) {
            
            //console.log("returned data is "+data);

            setTimeout(function(){
              returnedData(record, data);
              }, 1000);

          });
}

function returnedData(record, data){
  console.log("Data returned is "+data);
  if(data=="Record approved"){
    $('.status-column-'+record).html('<span class="badge badge-dot mr-4"><i class="bg-success"></i><span class="status">approved</span></span>');
  } 
  if(data=="Record rejected"){
    $('.status-column-'+record).html('<span class="badge badge-dot mr-4"><i class="bg-danger"></i><span class="status">Rejected</span></span>');
  } 
}



    $(".class-select").change(function(){

        var selectedOption = $(this).children("option:selected").val();
        var otherSelectedOption = $('.course-select').children("option:selected").val();

        $('.table-row').each(function(){
          var value = $(this).children('td').children('.class-items').html();
          var otherValue = $(this).children('td').children('.course-items').html();
          console.log("HTML is "+value.trim());

          if(selectedOption=="All"){
            $(this).show();
            console.log("value "+value+" and "+selectedOption+" are the same");
          } else if(value.trim()==selectedOption && (otherValue.trim()==otherSelectedOption || otherSelectedOption=="All")){
            $(this).show();
            console.log("value "+value+" and "+selectedOption+" are the same");
          } else {
            $(this).hide();
            console.log("value "+value+" and "+selectedOption+" are not the same");
          }
        });

        console.log("You have selected - " + selectedOption);

    });

    $(".course-select").change(function(){

        var selectedOption = $(this).children("option:selected").val();
        var otherSelectedOption = $('.class-select').children("option:selected").val();

        $('.table-row').each(function(){
          var value = $(this).children('td').children('.course-items').html();
          var otherValue = $(this).children('td').children('.class-items').html();
          console.log("HTML is "+otherSelectedOption.trim());

          if(selectedOption=="All"){
            $(this).show();
            console.log("value "+value+" and "+selectedOption+" are the same");
          } else if(value.trim()==selectedOption && (otherValue.trim()==otherSelectedOption || otherSelectedOption=="All")){
            $(this).show();
            console.log("value "+value+" and "+selectedOption+" are the same");
          } else {
            $(this).hide();
            console.log("value "+value+" and "+selectedOption+" are not the same");
          }
        });

    });


    $(".subject-select").change(function(){

        var selectedOption = $(this).children("option:selected").val();
        var otherSelectedOption = $('.class-select').children("option:selected").val();

        $('.table-row').each(function(){
          var value = $(this).children('td').children('.subject-items').html();
          var otherValue = $(this).children('td').children('.class-items').html();
          console.log("HTML is "+otherSelectedOption.trim());

          if(selectedOption=="All"){
            $(this).show();
            console.log("value "+value+" and "+selectedOption+" are the same");
          } else if(value.trim()==selectedOption && (otherValue.trim()==otherSelectedOption || otherSelectedOption=="All")){
            $(this).show();
            console.log("value "+value+" and "+selectedOption+" are the same");
          } else {
            $(this).hide();
            console.log("value "+value+" and "+selectedOption+" are not the same");
          }
        });

    });


    $(".only-subject-select").change(function(){

        var selectedOption = $(this).children("option:selected").val();


        $('.table-row').each(function(){
          var value = $(this).children('td').children('.subject-items').html();

          // console.log("HTML is "+otherSelectedOption.trim());

          if(selectedOption=="All"){
            $(this).show();
            // console.log("value "+value+" and "+selectedOption+" are the same");
          } else if(value.trim()==selectedOption){
            $(this).show();
            // console.log("value "+value+" and "+selectedOption+" are the same");
          } else {
            $(this).hide();
          }
        });

    });


    $(document).ready(function() {

      $('.alert').alert();

        $('.subjectsNotForBtn').off('click').on('click',subjectsNotFor);


        function subjectsNotFor(){
            const clickedSubjectid = $(this).siblings('.subjectid').val();
            const clickedSubjectname = $(this).html();
            let addCheck = 0;

            $('.subjectsFor').each(function(){
              if($(this).children('.subjectid').val()==clickedSubjectid){
                addCheck = 1;
              }
            });

            if(addCheck==0){
              $('.selSubjs').after('<div class="form-group row subjectsFor"><input type="hidden" name="subjectid" class="subjectid" value="'+clickedSubjectid+'"><button class="btn btn-primary btn-block subjectsForBtn" type="button" style="color: whitesmoke">'+clickedSubjectname+'</button></div>');

              $('.subjectsForBtn').off('click').on('click',subjectsFor);

              $(this).parent().remove();
            }
        }


        $('.subjectsForBtn').off('click').on('click',subjectsFor);



          function subjectsFor(){
            const clickedSubjectid = $(this).siblings('.subjectid').val();
            const clickedSubjectname = $(this).html();
            let addCheck = 0;

            $('.subjectsNotFor').each(function(){
              if($(this).children('.subjectid').val()==clickedSubjectid){
                addCheck = 1;
              }
            });

            if(addCheck==0){
               $('.deselSubjs').after('<div class="form-group row subjectsNotFor"><input type="hidden" name="subjectid" class="subjectid" value="'+clickedSubjectid+'"><button class="btn btn-info btn-block subjectsNotForBtn" type="button" style="color: black">'+clickedSubjectname+'</button></div>');

               $('.subjectsNotForBtn').off('click').on('click',subjectsNotFor);
            }

            $(this).parent().remove();
           

            
        }



        // Save Subject Mappings made
        $('.save-mapping').off('click').on('click',function(){
            var classid = $('.classid').val();
            var subjects = [];

            $('.subjectsFor').each(function(){
              console.log("pushing "+$(this).children('.subjectid').val());
              subjects.push($(this).children('.subjectid').val());
            });

            saveMapping(classid, subjects);

        });


        function saveMapping(classid, subjects){
    jQuery.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
          });

        

          var formData = {"classid" : classid,"subjects" : subjects};

          console.log('about to send '+formData.subjects+"!!");

          jQuery.ajax({
            url: '/savemapping',
            type: 'POST',
            data:formData,
            dataType    : 'text',
                error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
      }
            })
          .done(function(data) {
            
            //console.log("returned data is "+data);

            setTimeout(function(){
              savedData(data);
              }, 1000);

          });
}


    function savedData(data){
      console.log("data: "+data);
    }


    $('.viewStudents').off('click').on('click',function(){
        const subjectid = $(this).val();
        const classid = $('.class-selected').children("option:selected").val();

        getStudents(classid, subjectid);

        $('.subject-id').val(subjectid);

        console.log("Selected Class is "+classid);

    });


    function getStudents(classid, subjectid){
       jQuery.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
          });

        

          var formData = {"classid" : classid,"subjectid" : subjectid};

          // console.log('about to send '+formData.subjects+"!!");

          jQuery.ajax({
            url: '/getStudents',
            type: 'POST',
            data:formData,
            dataType    : 'text',
                error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
      }
            })
          .done(function(data) {
            
            //console.log("returned data is "+data);

            setTimeout(function(){
              data = JSON.parse(data);
              showStudents(data['students'],classid);
              showTests(data['tests'],classid,subjectid);
              }, 1000);

          });
    }

    // let loadedStudents;

    if($('.displayStudents').length){
      let loadedStudents = JSON.parse($('.displayStudents').val());

      $('.class-selected').change(function(){
        const classid = $(this).children("option:selected").val();

        console.log("selected class is "+loadedStudents);

        showStudents(loadedStudents,classid);

      });
    }

    

    function showStudents(students, classid){
      

      console.log("data returned is "+students.id);


      $('.displayStudents').nextAll().remove();

      students.reverse().filter(studentClass=>studentClass.class_id == classid).map(student=>{
        console.log(student);

        html = '<tr class="table-row"><input type="hidden" class="studentid" value="'+student.student_id+'"><th scope="row"><div class="media align-items-center"><div class="media-body"><span class="name mb-0 text-sm">'+student.first_name+' '+student.last_name+'</span></div></div></th><td><div class="d-flex align-items-center class-items">'+student.class+'</div></td><td><div class="d-flex align-items-center"><input type="text" class="form-control score"></div></td></tr>';


        

        $('.displayStudents').after(html);

      });
    }

    function showTests(tests,classid,subjectid){

      console.log("data returned is "+tests);

      $('.tests').nextAll().remove();

      tests.map(test => {
        html = '<div class="col-3 mt-1"><button class="btn btn-primary btn-block getStudentTests" value="'+test+'" type="button">'+test+'</button></div>';

        $('.tests').after(html);

      });

      $('.getStudentTests').off('click').on('click',function(){
          var testname = $(this).val();

          console.log("Test Name is "+testname);

          getTestScores(testname,classid,subjectid);
      });
    }



    function showTestScores(students,testtitle){
      

      console.log("data returned is "+students.id);

      $('.testTitle').val(testtitle);


      $('tr').each(function(){
        const thisStudent = $(this).children('.studentid').val();
        const scoreBox = $(this).children('td').children('div').children('.score');

        students.map((student, i)=>{
          console.log(student);

          if(i==0){
            $('.term').val(student.term);
          }


          if(thisStudent == student.student_id){
            scoreBox.val(student.test_score)
          }

        });
      
      });

      
    }



    function getTestScores(testname,classid,subjectid){
       jQuery.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
          });

        

          var formData = {"testname": testname, "classid" : classid,"subjectid" : subjectid};

          // console.log('about to send '+formData.subjects+"!!");

          jQuery.ajax({
            url: '/getTestScores',
            type: 'POST',
            data:formData,
            dataType    : 'text',
                error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
      }
            })
          .done(function(data) {
            
            //console.log("returned data is "+data);

            setTimeout(function(){
              data = JSON.parse(data);
              showTestScores(data['students'],data['testname']);
              }, 1000);

          });
    }


    $('.saveTestScore').submit(function(e){
        e.preventDefault();

        jQuery.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
          });

        var studentScores = [];
        var testtitle = $(this).find('.testTitle').val();
        var subjectid = $(this).find('.subject-id').val();
        const term = $(this).find('.term').children("option:selected").val();
        var proceed = 1;
        var message = "";

        if(term=="0"){
          proceed = 0;

          message = "Select Term";
        }


        $('.table-row').each(function(){

          const studentid = $(this).children('.studentid').val();
          const studentscore = $(this).children('td').children('div').children('.score').val();

              studentScores = [...studentScores,{"studentid": studentid,"studentscore": studentscore}];

            });

        if(proceed==1){
          insertStudentScores(studentScores,testtitle,subjectid,term);
        } else {
          const html = '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>'+message+'</div>';
              

              $('.alert-box').html(html);
        }
    });

    $('.saveScores').off('click').on('click',function(){

        var studentScores = [];
        const term = $(this).val();


        proceed = 1;

        $('.table-row').each(function(){

          const studentid = $(this).children('.studentid').val();
          const studentscore = $(this).children('td').children('div').children('.score').val();
          const subjectid = $(this).children('td').children('div').children('.subjectid').val();
          

          studentScores = [...studentScores,{"studentid": studentid,"studentscore": studentscore,"subjectid": subjectid}];

          console.log("student ID is "+studentid+" and student score is "+studentscore+" and subjectid is "+studentScores['subjectid']+" and term is "+term);

            });

        if(proceed==1){
          insertScores(studentScores,term);
        } else {
          const html = '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>'+message+'</div>';
              

              $('.alert-box').html(html);
        }
    });


    function insertStudentScores(studentScores,testtitle,subjectid,term){
        var formData = {"studentScores" : studentScores,"testtitle" : testtitle,"term": term,"subjectid": subjectid};

          console.log('about to send '+formData.studentScores+" and "+formData.testtitle+" with subject ID "+subjectid+"!!");

          console.log(formData.studentScores);

          jQuery.ajax({
            url: '/saveTestScores',
            type: 'POST',
            data:formData,
            dataType    : 'text',
                error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
      }
            })
          .done(function(data) {
            
            //console.log("returned data is "+data);

            setTimeout(function(){

              const html = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data+'</div>';
              
              console.log(data);
              $('.alert-box').html(html);

              setTimeout(function(){
                $('.alert').alert('close');
              },2000);

              }, 1000);

          });
    }


    function insertScores(studentScores,term){

      jQuery.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
          });

        var formData = {"studentScores" : studentScores,"term": term};

          console.log('about to send '+formData.studentScores+" with subject ID "+formData.subjectid+"!!");

          jQuery.ajax({
            url: '/saveExamScores',
            type: 'POST',
            data:formData,
            dataType    : 'text',
                error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
      }
            })
          .done(function(data) {
            
            //console.log("returned data is "+data);

            setTimeout(function(){
              data = data;

              const html = '<div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data+'</div>';
              
              console.log(data);
              $('.alert-box').html(html);

              setTimeout(function(){
                $('.alert').alert('close');
              },2000);

              }, 1000);

          });
    }


      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(studentAverageScores);

      function studentAverageScores() {

        console.log("chart values are "+$('.classname').val());

        var chartItems = $('.classname').val();

        var jsonChartItems = JSON.parse(chartItems);

        console.log("JSON chart values are "+jsonChartItems);

        const title = ["class","average score"];

        let class_data = [];

        class_data.push(title);

        $(jsonChartItems).each(function(){

            console.log(this);

            let eachClass = [];

            eachClass.push(this.class_name);

            if(this.average_score==null){
              this.average_score = 0;
            } else {
              this.average_score = Number(this.average_score);
            }

            eachClass.push(this.average_score);

            // console.log(eachClass);

            class_data.push(eachClass);

            console.log(class_data);


          });

        // var data = google.visualization.arrayToDataTable([
        //   ['Year', 'Sales', 'Expenses'],
        //   ['2004',  1000,      400],
        //   ['2005',  1170,      460],
        //   ['2006',  660,       1120],
        //   ['2007',  1030,      540]
        // ]);

        var data = google.visualization.arrayToDataTable(class_data);

        var options = {
          title: 'Class Performance',
          curveType: 'function',
          legend: { position: 'bottom' },
          animation: {
            "startup": true,
            duration: 1000,
            easing: 'out',
          }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }



      google.charts.setOnLoadCallback(highScoreSubjects);

      function highScoreSubjects() {

        console.log("chart values are "+$('.highscoresubjects').val());

        var chartItems = $('.highscoresubjects').val();

        var jsonChartItems = JSON.parse(chartItems);

        console.log("JSON chart values are "+jsonChartItems);

        const title = ["Subject","score"];

        let subject_data = [];

        subject_data.push(title);

        $(jsonChartItems).each(function(){

            console.log(this);

            let eachSubject = [];

            eachSubject.push(this.subject_name);

            if(this.score_sum==null){
              this.score_sum = 0;
            } else {
              this.score_sum = Number(this.score_sum);
            }

            // this.score_sum = this.score_sum/100;

            eachSubject.push(this.score_sum);

            // console.log(eachClass);

            subject_data.push(eachSubject);

            console.log(subject_data);


          });


        var data = google.visualization.arrayToDataTable(subject_data);

      var view = new google.visualization.DataView(data);
      // view.setColumns([0, 1,
      //                  { calc: "stringify",
      //                    sourceColumn: 1,
      //                    type: "string",
      //                    role: "annotation" },
      //                  2]);

      var options = {
        title: "Top scoring subjects",
        // width: 600,
        // height: 400,
        bar: {groupWidth: "5%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("highscoresubjects"));
      chart.draw(view, options);
      }



    });
