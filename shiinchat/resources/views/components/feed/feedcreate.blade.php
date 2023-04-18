<section id="feedCreate-main-container" class='px-4 py-2 rounded'>
    <h5 class="text-left">CREATE BLOG</h5>
    <form action="{{ route('blogs.store') }}" method="POST">@csrf

      <div  class="form-group">
          <input
            type="text"
            class="form-control shadow-none p-1 h-50 rounded-0"
            id="exampleFormControlInput1"
            placeholder="Input Title"
            name="title"
          />
      </div>
      <div class="form-group">
          <textarea
            class="form-control shadow-none p-1 h-50 rounded-0"
            id="content"
            rows="3"
            name="content"
            placeholder='Input content'
          ></textarea>
      </div>
      <button class='btn btn-outline-primary col-12 shadow-none p-1 h-50 rounded-0'>Post</button>
    </form>
  </section>
