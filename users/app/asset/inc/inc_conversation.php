<div class="container">
    <div class="jumbotron mb-3 bg-white">
        <div class="d-flex flex-column gap-2" style="min-height: 100vh" id="messages"></div>
        <div class="input-field fixed-bottom m-2">
          <form onsubmit="return false" class="d-flex gap-2" action="" id="chat-form" accept-charset="utf-8">
            <input required class="form-control" type="text" name="message" id="message" value="" />
            <button class="btn btn-primary" type="submit">
              send
            </button>
          </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" charset="utf-8">
  let sender = <?= $user["id"]; ?>, 
      start = 1
      url = window.location.href;
  function load() {
    $(".date").each(function(index){
      let date = $(this).attr("data-time")
      $(this).html( parseTime(date) )
    })
    
    let url2 = `${url}?start=${start}`
    $.get(url2, function(result){
      console.log(start)
      if (result.items) {
        result.items.forEach(item => {
          start += 1
          let identity = item.sender == sender ? "self" : "other"
          $("#messages").append(`
            <div class='chat d-flex flex-column ${ identity }'>
              <div class='content'>
                <p> 
                  ${ item.username }
                </p>
                ${ item.message }
              </div>
              <p data-time='${ item.date }' class='date'> ${ parseTime(item.date) } </p>
            </div>
          `)
          window.scrollBy(0, 100);
        })
      }
    })
    
  }
  
  function parseTime(date) {
    let time_comment = new Date(date).getTime();
    let time_now = new Date().getTime();
    
    let selisihWaktu = time_now - time_comment;
    var d = Math.round(selisihWaktu / (1000 * 60 * 60 * 24));
    var h = Math.floor((selisihWaktu % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var m = Math.floor((selisihWaktu % (1000 * 60 * 60)) / (1000 * 60));
    var s = Math.floor((selisihWaktu % (1000 * 60)) / 1000);
    var msg;
      /* beberapa detik yg lalu */
    if(s == 0 && m < 1 && d < 1){
      msg = `baru saja`;
      return msg
    } else if(s < 60 && m < 1 && d < 1){
      msg = `${s} detik lalu`;
      return msg
    } else if(m < 60 && h < 1 && d < 1) {
      msg = `${m} menit yang lalu`;
      return msg
    } else if(h < 60 && d < 1){
      msg = `${h} jam yang lalu`;
      return msg
    } else if(d >= 1 && d < 7){
      msg = `${d} hari yang lalu`;
      return msg
    } else if(d >= 7 && d < 30){
      d = Math.floor(d / 7);
      msg = `${d} minggu yang lalu`;
      return msg
    } else if(d >= 30 && d < 365){
      d = Math.floor(d / 30);
        msg = `${d} bulan yang lalu`;
        return msg
      } else if(d >= 365 || d >= 366){
        d = Math.round(d / 365.25);
        msg = `${d} tahun yang lalu`;
        return msg
      }
  }
  $(document).ready(function(){
    setInterval(load, 1000)
    
    $("#chat-form").submit(function(){
      let formdata = {
        message: $("#message").val(),
        sender: sender
      }
      $.post(url, formdata).done(function(data){
        console.log(data)
      })
      
      $("#message").val("")
      return false
    })
  })
</script>