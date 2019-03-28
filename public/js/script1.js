    //---------------------Favorite Buttons---------------------

    function getClickCallback(i) {
      return function() {
      document.getElementById("url").value = fav[i]['link'];
      };
    }

    function getClickCallback2(i) {
      return function() {
      document.getElementById("del").value = this.name;
      delButton();
      };
    }

    function foo(fav) {
      for (var i = 0; i < fav.length; i++) {
        var name  = fav[i]['name'];
        var links = fav[i]['link'];
        var btn = document.createElement("BUTTON");
        var t = document.createTextNode(name);
        btn.appendChild(t);
        btn.className="btn btn-default";
        btn.id=name;
        document.getElementById("vv").appendChild(btn);
        document.getElementById(name).onclick = getClickCallback(i);
      }

      for (var i = 0; i < fav.length; i++) {
        var name  = fav[i]['name'];
        var links = fav[i]['link'];
        var id = fav[i]['id'];
        var btn1 = document.createElement("BUTTON");
        var t = document.createTextNode(name);
        btn1.appendChild(t);
        btn1.className="btn btn-danger col-md-12";
        btn1.name=id;
        document.getElementById("v"+i).appendChild(btn1);
        document.getElementsByName(id)[0].onclick = getClickCallback2(i);
      }

    }
    

    function addButton() {
      form1 = document.getElementById("fav_form");
      form1.action = "/create";
      form1.submit();
    }

    function delButton() {
      form2 = document.getElementById("del_fav_form");
      form2.action = "/del";
      form2.submit();
    }


    //---------------------Analyse Button---------------------

    function checkURL() {
      var expression = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
      var regex = new RegExp(expression);
      var t = document.getElementById("url").value;

      if (t.match(regex)) {
        document.getElementById('show_loading_modal').click();
        form = document.getElementById("url_form");
        form.action = "/dashboard";
        form.submit();
      } else {
          swal.fire("","Veuillez entrer un lien valide", "error")
        }
    }

    function stopAnalyse() {
      document.location.reload(true);
    }


    //---------------------History Page---------------------

    function viewHistory(name) {
      document.getElementById("hid").value=name;
      form = document.getElementById("History_form");
      form.target = "_blank";
      form.action = "/getHistory";
      form.submit();
    }

    function delHistory(name) {
      document.getElementById("hid").value=name;
      event.preventDefault();
      form = document.getElementById("History_form");
      form.target = "";
      Swal.fire({
        title: 'Êtes-vous sûr?',
        text: "Cette action est irréversible!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui!',
        cancelButtonText: 'Annuler!'
      }).then((result) => {
        if (result.value) {
          form.action = "/delHistory";
            form.submit();
        }
      })      
    }

    //---------------------Dashboard & HistoryDetails Page---------------------

    $('tr.tr_stat:lt(6)').addClass('active');
    $('tr.tr_img:lt(4)').addClass('active');

    $('a.load_more').on('click', function(e) {
      e.preventDefault();  
      //var $rows = $('table tr');
      var $rows = $('tr.tr_stat');
      var lastActiveIndex = $rows.filter('.active:last').index();
      $rows.filter(':lt(' + (lastActiveIndex + 7) + ')').addClass('active');
    });

    $('a.load_all').on('click', function(e) {
      e.preventDefault();  
      //var $rows = $('table tr');
      var $rows = $('tr.tr_stat');
      var lastActiveIndex = $rows.filter('.active:last').index();
      $rows.filter(':lt(' + (lastActiveIndex + 10000) + ')').addClass('active');
    });

    $('a.load_more_img').on('click', function(e) {
      e.preventDefault();  
      //var $rows = $('table tr');
      var $rows = $('tr.tr_img');
      var lastActiveIndex = $rows.filter('.active:last').index();
      $rows.filter(':lt(' + (lastActiveIndex + 5) + ')').addClass('active');
    });

    $('.load_more').click(function () {
      document.getElementById('load_more_stat').scrollIntoView({
        behavior: 'smooth'
      });
      return false;
    });

    $('.load_all').click(function () {
      document.getElementById('load_all_stat').scrollIntoView({
        behavior: 'smooth'
      });
      return false;
    });

    $('.load_more_img').click(function () {
      document.getElementById('load_more_img').scrollIntoView({
        behavior: 'smooth'
      });
      return false;
    });

    $('.go_up').click(function () {
      $('html, body').animate({
          scrollTop:0
      }, 'slow');
      return false;
    });

    function pdf(name) {
      document.getElementById("hid").value=name;
      document.getElementById("mail1").disabled=false;
      form = document.getElementById("pdf_form");
      form.action = "/pdf";
      form.submit();
    }

    function mail() {
      form = document.getElementById("pdf_form");
      target=""
      form.action = "/send-mail";
      form.submit();
    }


    //---------------------User Page---------------------

    function validatePassword() {
      var pass = document.getElementById("password_1");
      var confirm = document.getElementById("password_2");
      if (pass.value==""){
        return 2;
      } else {
        if (pass.value != confirm.value) {
          pass.style.border = "1px solid red";
          confirm.style.border = "1px solid red";
          return 1;
        } else if (pass.value.length < 6){
          return 0;
        }}
    }

    function validatePersonalInfo() {
      errors = 0;
      var name = document.getElementById("name");
      if (name.value == "") {
        fname.style.border = "1px solid red";
        errors = 1;
      }
      return errors;
    }


    function updatePersonalInfo() {
      var errors = validatePersonalInfo();
      var errors_2 = validatePassword();
      var pass_old = document.getElementById('password_old'); 
      if (errors_2 == 2) {
        if (errors == 1) {
          swal.fire("","Merci de remplir tous les champs obligatoirs !", "warning");
        } else {
          var form = document.getElementById("personalinfo_form");
          form.action = "/update-personal-info";
          form.submit();
        }
      } else if (errors_2 == 0) {
          swal.fire("","Veuillez entrer un mot de passe >= 6", "error");
      } else {
          if (pass_old.value==""){
            swal.fire("","Veuillez entrer votre mot de passe actuel correct", "error");
          } else if (errors_2 == 1) {
              swal.fire("","Votre mot de passe de confirmation n'est pas correct !", "error");
              } else {
                  var form = document.getElementById("personalinfo_form");
                  form.action = "/update-password";
                  form.submit();
              }
      }
      
    }
