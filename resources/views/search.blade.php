<!-- Search bar -->
<div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Search for ToDo items..." id="search-input">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="button" id="search-button">Search</button>
    </div>
  </div>
  
  <!-- Script to handle search -->
  <script>
  $(document).ready(function() {
      // Handle search button click event
      $('#search-button').on('click', function() {
          var query = $('#search-input').val();
          // Make AJAX request to fetch ToDo items matching search query
          $.ajax({
              url: '/views/search',
              type: 'POST',
              data: { query: query },
              success: function(result) {
                  // Update ToDo list with search results
                  $('#todo-list').html(result);
              }
          });
      });
  });
  </script>
  