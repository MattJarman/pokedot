<template>
  <div>
    <jet-banner />

    <div class="min-h-screen">
        <Popover open="true">
            <nav class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between h-16">
            <div class="flex">
              <!-- Logo -->
              <div class="flex-shrink-0 flex items-center">
                <inertia-link :href="route('dashboard')">
                  <jet-application-mark class="block h-9 w-auto" />
                </inertia-link>
              </div>

              <!-- Navigation Links -->
              <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <jet-nav-link
                  :href="route('dashboard')"
                  :active="route().current('dashboard')"
                >
                  Dashboard
                </jet-nav-link>
                <!-- Hard coded as an example -->
                <jet-nav-link
                  :href="route('pokemon.show', 1)"
                  :active="route().current('pokemon.show')"
                >
                  Pokemon
                </jet-nav-link>
              </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
              <!-- Settings Dropdown -->
              <div class="ml-3 relative" v-if="$page.props.user">
                <jet-dropdown align="right" width="48">
                  <template #trigger>
                    <button
                      v-if="$page.props.jetstream.managesProfilePhotos"
                      class="
                        flex
                        text-sm
                        border-2 border-transparent
                        rounded-full
                        focus:outline-none
                        focus:border-gray-300
                        transition
                      "
                    >
                      <img
                        class="h-8 w-8 rounded-full object-cover"
                        :src="$page.props.user.profile_photo_url"
                        :alt="$page.props.user.name"
                      />
                    </button>

                    <span v-else class="inline-flex rounded-md">
                      <button
                        type="button"
                        class="
                          inline-flex
                          items-center
                          px-3
                          py-2
                          border border-transparent
                          text-sm
                          leading-4
                          font-medium
                          rounded-md
                          text-gray-500
                          bg-white
                          hover:text-gray-700
                          focus:outline-none
                          transition
                        "
                      >
                        {{ $page.props.user.name }}

                        <svg
                          class="ml-2 -mr-0.5 h-4 w-4"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                          />
                        </svg>
                      </button>
                    </span>
                  </template>

                  <template #content>
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                      Manage Account
                    </div>

                    <jet-dropdown-link :href="route('profile.show')">
                      Profile
                    </jet-dropdown-link>

                    <jet-dropdown-link
                      :href="route('api-tokens.index')"
                      v-if="$page.props.jetstream.hasApiFeatures"
                    >
                      API Tokens
                    </jet-dropdown-link>

                    <div class="border-t border-gray-100"></div>

                    <!-- Authentication -->
                    <form @submit.prevent="logout">
                      <jet-dropdown-link as="button">
                        Log Out
                      </jet-dropdown-link>
                    </form>
                  </template>
                </jet-dropdown>
              </div>

              <div v-else class="space-x-2">
                <inertia-link
                  :href="route('register')"
                  class="
                    w-24
                    px-4
                    py-2
                    border border-transparent
                    rounded-md
                    shadow-sm
                    text-base
                    font-medium
                    text-white
                    bg-indigo-600
                    hover:bg-indigo-700
                  "
                >
                  Register
                </inertia-link>
                <inertia-link
                  :href="route('login')"
                  class="
                    w-24
                    px-4
                    py-2
                    border border-transparent
                    rounded-md
                    shadow-sm
                    text-base
                    font-medium
                    border-2 border-indigo-600
                    hover:bg-gray-100
                  "
                >
                  Log in
                </inertia-link>
              </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
              <PopoverButton
                class="
                  inline-flex
                  items-center
                  justify-center
                  p-2
                  rounded-md
                  text-gray-400
                  hover:text-gray-500
                  hover:bg-gray-100
                  focus:outline-none
                  focus:bg-gray-100
                  focus:text-gray-500
                  transition
                "
              >
                <span class="sr-only">Open menu</span>
                <svg
                  class="pointer-events-none h-6 w-6"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  aria-hidden="true"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth="2"
                    d="M4 6h16M4 12h16M4 18h16"
                  />
                </svg>
              </PopoverButton>
            </div>
          </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
          <PopoverPanel focus class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden z-50">
            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
              <div class="pt-5 pb-6 px-5">
                <div class="flex items-center justify-between">
                  <div class="flex-shrink-0 flex items-center">
                    <inertia-link :href="route('dashboard')">
                      <jet-application-mark class="block h-9 w-auto" />
                    </inertia-link>
                  </div>
                  <div class="-mr-2">
                    <PopoverButton
                      class="
                        bg-white
                        rounded-md
                        p-2
                        inline-flex
                        items-center
                        justify-center
                        text-gray-400
                        hover:text-gray-500
                        hover:bg-gray-100
                        focus:outline-none
                      "
                    >
                      <span class="sr-only">Close menu</span>
                      <svg
                        class="h-6 w-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        aria-hidden="true"
                      >
                        <path d="M6 18L18 6M6 6l12 12"/>
                      </svg>
                    </PopoverButton>
                  </div>
                </div>
                <div class="mt-6">
                  <nav class="grid gap-y-8">
                    <jet-responsive-nav-link
                      class="-m-3 p-3"
                      :href="route('dashboard')"
                      :active="route().current('dashboard')"
                    >
                      Dashboard
                    </jet-responsive-nav-link>
                    <jet-responsive-nav-link
                      class="-m-3 p-3"
                      :href="route('pokemon.show', 1)"
                      :active="route().current('pokemon.show')"
                    >
                      Pokemon
                    </jet-responsive-nav-link>
                  </nav>
                </div>
              </div>
              <div class="py-4 px-5">
                <div v-if="$page.props.user" class="flex flex-row">
                  <div class="flex items-center flex-grow">
                    <form @submit.prevent="logout">
                      <button>
                        <span class="sr-only">Sign Out</span>
                        <svg
                          class="w-6 h-6 text-gray-400 hover:text-indigo-600"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          fill="none"
                          stroke="currentColor"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        >
                          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                          <polyline points="16 17 21 12 16 7" />
                          <line x1="21" y1="12" x2="9" y2="12" />
                        </svg>
                      </button>
                    </form>
                  </div>
                  <div class="flex items-center justify-end">
                    <inertia-link
                      :href="route('profile.show')"
                      class="
                        rounded-full
                        border-1 border-gray-200
                        bg-gray-100
                        text-indigo-600
                        flex
                        items-center
                        justify-center
                        font-bold
                        w-10
                        h-10
                      "
                    >
                      <div
                        v-if="$page.props.jetstream.managesProfilePhotos"
                        class="flex-shrink-0 mr-3"
                      >
                        <img
                          class="h-10 w-10 rounded-full object-cover"
                          :src="$page.props.user.profile_photo_url"
                          :alt="$page.props.user.name"
                        />
                      </div>
                      <div v-else>
                        {{ $page.props.user.name.charAt(0) }}
                      </div>
                    </inertia-link>
                  </div>
                </div>
                <div v-else class="flex justify-center space-x-4">
                  <inertia-link
                    :href="route('register')"
                    class="
                      w-1/2
                      flex
                      items-center
                      justify-center
                      px-4
                      py-3
                      rounded-md
                      shadow-sm
                      text-base
                      font-medium
                      text-white
                      bg-indigo-600
                      hover:bg-indigo-700
                    "
                  >
                    Sign Up
                  </inertia-link>
                  <inertia-link
                    :href="route('login')"
                    class="
                      w-1/2
                      flex
                      items-center
                      justify-center
                      px-4
                      py-3
                      border border-transparent
                      rounded-md
                      shadow-sm
                      text-base
                      font-medium
                      text-black
                      border-2 border-indigo-600
                      hover:bg-gray-100
                    "
                  >
                    Log in
                  </inertia-link>
                </div>
              </div>
            </div>
          </PopoverPanel>
        </transition>
      </nav>
    </Popover>

      <!-- Page Heading -->
      <header class="bg-white" v-if="$slots.header">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <slot name="header"></slot>
        </div>
      </header>

      <!-- Page Content -->
      <main>
        <slot></slot>
      </main>
  </div>
  </div>
</template>

<script>
import { Popover, PopoverButton, PopoverGroup, PopoverPanel } from '@headlessui/vue'
import JetApplicationMark from "@/Jetstream/ApplicationMark";
import JetBanner from "@/Jetstream/Banner";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetNavLink from "@/Jetstream/NavLink";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink";

export default {
  components: {
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
    JetApplicationMark,
    JetBanner,
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    JetResponsiveNavLink,
  },
  methods: {
    logout() {
      this.$inertia.post(route("logout"));
    },
  },
};
</script>
