$(document).ready(function () {
  bindEvents();
  populateFriendList();
})

function bindEvents () {
  lookUpUsers();
}

function lookUpUsers () {
  $('input[name="friendName"]').on("keyup", function () {
    $.ajax({
      url: "/serviceProxy.php?url=http://10.90.1.17/api/h/us/" + this.value,
      type: "GET"
      // context: document.body
    }).done(function(response) {
      $('.friend-list').empty()
      var userList = JSON.parse(response).user
      _.each(userList, function (user) {
        var imageTag = "<img src=" + user.profilePic + ">"
        var friendName = user.userName
        $('.friend-list').append("<div class='friend-box'>" + "<i class='fa fa-plus-circle'></i>" + imageTag +  friendName + "</div>")
      })
      $( this ).addClass( "done" );
    });
  })
}

function populateFriendList() {
    $.ajax({
      url: "/serviceProxy.php?url=http://10.90.1.17/api/h/us/",
      type: "GET"
      // context: document.body
    }).done(function(response) {
      var userList = JSON.parse(response).user
      _.each(userList, function (user) {
        var imageTag = "<img src=" + user.profilePic + ">"
        var friendName = user.userName
        $('.friend-list').append("<div class='friend-box'>" + "<i class='fa fa-plus-circle'></i>" + imageTag +  friendName + "</div>")
      })
      $( this ).addClass( "done" );
    });
}
