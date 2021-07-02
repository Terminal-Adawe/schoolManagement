<!-- The Modal -->
  <div class="modal fade" id="calendar-modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Activities</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body calendar-body">
          <div id="calendar"></div>
        </div>

        <div class="modal-footer">
        <button class="btn" data-toggle="modal" data-target="#addevents">
          <i class="fas fa-plus-circle fa-lg"></i> Add event
        </button>
      </div>
      </div>

      
        
      </div>
    </div>
  </div>




    <div class="modal fade" id="addevents">
      <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <form class="event-scheduler">
        <!-- Modal body -->
        <div class="modal-body">
          
            <div class="form-group">
              <input type="text" class="form-control schedule-event"  placeholder="Enter event">
            </div>
            <div class="form-group">
              <label for="eventtype">Select Event type:</label>
              <select class="form-control" id="eventtype">
                @foreach($data['eventTypes'] as $event)
                <option value="{{ $event->id }}">{{ $event->event_type }}</option>
                @endforeach
              </select>
            </div> 
            <div class="form-group">
              <label for="from">From:</label>
              <input type="date" class="form-control" class="from" id="from">
            </div>
            <div class="form-group">
              <label for="to">To:</label>
              <input type="date" class="form-control" class="to" id="to">
            </div>

        </div>

        <div class="modal-footer">
        <button class="btn" type="submit">
          <i class="fas fa-plus-circle fa-lg"></i> Add
        </button>
      </div>
    </form>
      </div>
        
      </div>
    </div>
    