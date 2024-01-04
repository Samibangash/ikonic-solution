// init Isotope
var $grid = $('.collection-list').isotope({
  // options
});
// filter items on button click
$('.filter-button-group').on( 'click', 'button', function() {
  var filterValue = $(this).attr('data-filter');
  resetFilterBtns();
  $(this).addClass('active-filter-btn');
  $grid.isotope({ filter: filterValue });
});

var filterBtns = $('.filter-button-group').find('button');
function resetFilterBtns(){
  filterBtns.each(function(){
    $(this).removeClass('active-filter-btn');
  });
}

$(document).ready(function() {
  $('#feedbackForm').on('submit', function(e) {
      e.preventDefault();

      // Here you can add the code to process the form data.
      // For now, it just logs to the console.
      var feedbackData = {
          title: $('#feedbackTitle').val(),
          category: $('#feedbackCategory').val(),
          description: $('#feedbackDescription').val()
      };
      console.log(feedbackData);

      // Reset and hide the modal
      $('#feedbackModal').modal('hide');
      this.reset();
  });
});
function addComment(button) {
  var commentText = prompt("Please enter your comment:");
  if (commentText) {
      var commentsContainer = $(button).siblings('.feedback-comments');
      commentsContainer.append('<p class="bg-light p-2">' + commentText + '</p>');
  }
}
