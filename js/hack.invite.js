var selected = []

$(document).ready(function () {
  bindEvents();
  populateFriendList();
})

function bindEvents () {
  lookUpUsers();
  toggleFriendSelectedStatus();
  submitSelectedFriends();
}

function lookUpUsers () {
  $('input[name="friendName"]').on("input", function () {
    $.ajax({
      url: "/serviceProxy.php?url=http://lomostreet.com/api.php/h/us/" + this.value,
      type: "GET"
    }).done(function(response) {
      $('.friend-list').empty()
      var userList = JSON.parse(response).user
      if (userList.length === 0) {
        $('.friend-list').append("<div>No friends matched your search term.</div>")
      } else {
        _.each(userList, function (user) {
          var friendBoxEl = "<div class='friend-box' data-id=" + user.userId + ">"
            + "<span class='text-right checkbox'><i class='fa fa-check'></i></span>"
            + "<img src=" + user.profilePic + ">"
            +  user.userName + "</div>"
          $('.friend-list').append(friendBoxEl)
        })
      }
    });
  })
}

function populateFriendList() {
  $.ajax({
    url: "/serviceProxy.php?url=http://lomostreet.com/api.php/h/us/",
    type: "GET"
  }).done(function(response) {
    var userList = JSON.parse(response).user
    _.each(userList, function (user) {
      var friendBoxEl = "<div class='friend-box' data-id=" + user.userId + ">"
        + "<span class='text-right checkbox'><i class='fa fa-check'></i></span>"
        +  user.userName
        + "<img src=" + user.profilePic + ">"
        + "</div>"

      $('.friend-list').append(friendBoxEl)
    })
  });
}

function toggleFriendSelectedStatus () {
  $(document).on("click", ".friend-box", function () {
    var friendId = $(this).attr("data-id"),
      inSelectedList = _.find(selected, function (id) { return id === friendId })

    if (!inSelectedList) {
      $(this).css("background-color", "gray")
      $(this).find(".checkbox").css("display", "inline")
      selected.push(friendId)
    } else {
      $(this).css("background-color", "white")
      $(this).find(".checkbox").css("display", "none")
      selected = _.without(selected, friendId);
    }
  })
}

function submitSelectedFriends() {
  $('#submit-selected').on("click", function () {
    $.ajax({
      url: "/serviceProxy.php?url=http://lomostreet.com/api.php/h/agi",
      type: "POST",
      data: {
        "uid":1,
        "topic":"Trip to Hawaii",
        "desc":"Lets make a trip to hawaii together!! Just $500 each!!",
        "dateFrom":"2015-03-10",
        "dateTo":"2015-03-17",
        "amt":"500",
        "inviteTo":"2,4"
      }
    }).done(function (data) {

    })
  })
}
