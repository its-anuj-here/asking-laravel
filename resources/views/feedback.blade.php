<!-- feedback and contact us -->
<section class="text-gray-400 bg-gray-900 body-font relative">
  <div class="text-center pt-5">
    <h1
      class="sm:text-3xl text-2xl font-medium title-font text-white mb-1"
    >
      Contact Us
    </h1>

    <div class="flex mt-3 justify-center">
      <div
        class="w-16 h-1 rounded-full bg-yellow-500 inline-flex"
      ></div>
    </div>
  </div>
    <div class="container px-5 py-10 mx-auto flex sm:flex-nowrap flex-wrap">
      
      <div
        class="lg:w-2/3 md:w-1/2 bg-gray-900 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative"
      >
        <iframe
          title="map"
          class="absolute inset-0"
          style="filter: grayscale(1) contrast(1.2) opacity(0.9)"
          marginheight="0"
          marginwidth="0"
          scrolling="no"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d873.4011708326891!2d76.62222566956267!3d28.880374172782528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d84dbf218c673%3A0x828ef208f573d77e!2sDepartment%20Of%20Computer%20Science%20And%20Applications%2C%20MDU!5e0!3m2!1sen!2sin!4v1709389859285!5m2!1sen!2sin"
          width="100%"
          height="100%"
          frameborder="0"
        ></iframe>
        <div
          class="bg-gray-900 relative flex flex-wrap py-6 rounded shadow-md"
        >
          <div class="lg:w-1/2 px-6 mb-4">
            <h2
              class="title-font font-semibold text-white tracking-widest text-xs"
            >
              ADDRESS
            </h2>
            <p class="mt-1">
              Rohtak, Haryana, India
            </p>
          </div>
          <div class="lg:w-2/3 px-6 mt-4 lg:mt-0">
            <h2
              class="title-font font-semibold text-white tracking-widest text-xs"
            >
              EMAIL
            </h2>
            <a class="lg:w-1/5 text-yellow-400 leading-relaxed" href="mailto:group.it100project@gmail.com">group.it100project@gmail.com</a>
            <h2
              class="title-font font-semibold text-white tracking-widest text-xs mt-4"
            >
              PHONE
            </h2>
            <p class="leading-relaxed">123-456-7890</p>
          </div>
        </div>
      </div>
      <div
        class="lg:w-1/3 md:w-1/2 flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0"
      >
        <h2 class="text-white text-xl mb-1 font-medium title-font">
          Feedback
        </h2>
        <form method='post' action='{{route('feedback')}}'>
          @csrf
        <div class="relative mb-4">
          
          <label for="sender" class="leading-7 text-sm text-gray-400"
            >Name</label
          >
          <input
            type="text"
            id="sender"
            name="sender"
            class="w-full bg-gray-800 rounded border border-gray-700 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
          />
        </div>
        <div class="relative mb-4">
          <label for="email" class="leading-7 text-sm text-gray-400"
            >Email</label
          >
          <input
            type="email"
            id="email"
            name="email"
            class="w-full bg-gray-800 rounded border border-gray-700 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
          />
        </div>
        <div class="relative mb-4">
          <label for="message" class="leading-7 text-sm text-gray-400"
            >Message</label
          >
          <textarea
            id="message"
            name="message"
            class="w-full bg-gray-800 rounded border border-gray-700 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-900 h-32 text-base outline-none text-gray-100 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
          ></textarea>
        </div>
        <button
          class="text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg"
          type="submit"
        >
          Submit
        </button>
        </form>
        <p class="text-xs text-gray-400 text-opacity-90 mt-3 text-center">
          Thanks For Giving Your Precious Time
        </p>
      </div>
    </div>
  </section>