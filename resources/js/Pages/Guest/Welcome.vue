<template>
  <GuestLayout class="">
    <!-- Hero Section -->
    <div class="pt-10 bg-gray-900 sm:pt-16 lg:pt-8 lg:pb-14 lg:overflow-hidden">
      <div class="mx-auto max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8">
          <div
              class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 sm:text-center lg:px-0 lg:text-left lg:flex lg:items-center">
            <div class="lg:py-24">
              <h1 class="mt-4 text-4xl tracking-tight font-extrabold text-white sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">
                Where Togetherness Meets
                <Typed :options="options" class="text-secondaryAccent h-12"
                ><h1 class="typing"></h1
                ></Typed>
              </h1>

              <p class="text-base text-gray-300 sm:text-xl mt-4 lg:text-lg xl:text-xl">Anim aute id magna aliqua ad ad
                non
                deserunt sunt. Qui irure qui Lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat.</p>
              <div class="mt-10 sm:mt-12">
                <form action="#" class="sm:max-w-xl sm:mx-auto lg:mx-0">
                  <div class="sm:flex">
                    <div class="min-w-0 flex-1">
                      <label class="sr-only" for="email">Email address</label>
                      <input id="email"
                             class="block w-full px-4 py-3 rounded-md border-0 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900"
                             placeholder="Enter your email"
                             type="email"/>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-3">
                      <button
                          class="block w-full py-3 px-4 rounded-md shadow bg-gradient-to-r from-teal-500 to-cyan-600 text-white font-medium hover:from-teal-600 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900"
                          type="submit">
                        Start free trial
                      </button>
                    </div>
                  </div>
                  <p class="mt-3 text-sm text-gray-300 sm:mt-4">Start your free 14-day trial, no credit card necessary.
                    By providing your email, you agree to our <a class="font-medium text-white" href="#">terms of
                      service</a>.</p>
                </form>
              </div>
            </div>
          </div>
          <div class="hidden lg:block mt-12 -mb-16 sm:-mb-48 lg:m-0 lg:relative">
            <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0">
              <!-- Illustration taken from Lucid Illustrations: https://lucid.pixsellz.io/ ---->
              <HimatifThirdLogo alt=""
                                class="w-full lg:absolute lg:inset-y-0 lg:left-0 lg:h-full lg:w-auto lg:max-w-none"/>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Logo Cloud -->
    <div class="bg-gray-100">
      <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <p class="text-center text-sm font-semibold uppercase text-gray-500 tracking-wide">Trusted by over 5 very
          average small businesses</p>
        <div class="mt-6 grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-5">
          <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
            <img alt="Tuple" class="h-12" src="https://tailwindui.com/img/logos/tuple-logo-gray-400.svg"/>
          </div>
          <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
            <img alt="Mirage" class="h-12" src="https://tailwindui.com/img/logos/mirage-logo-gray-400.svg"/>
          </div>
          <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
            <img alt="StaticKit" class="h-12" src="https://tailwindui.com/img/logos/statickit-logo-gray-400.svg"/>
          </div>
          <div class="col-span-1 flex justify-center md:col-span-2 md:col-start-2 lg:col-span-1">
            <img alt="Transistor" class="h-12" src="https://tailwindui.com/img/logos/transistor-logo-gray-400.svg"/>
          </div>
          <div class="col-span-2 flex justify-center md:col-span-2 md:col-start-4 lg:col-span-1">
            <img alt="Workcation" class="h-12" src="https://tailwindui.com/img/logos/workcation-logo-gray-400.svg"/>
          </div>
        </div>
      </div>
    </div>

    <!-- Alternating Feature Sections -->
    <div class="relative pt-16 pb-32 overflow-hidden">
      <div aria-hidden="true" class="absolute inset-x-0 top-0 h-48 bg-gradient-to-b from-gray-100"/>
      <div class="relative">
        <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24">
          <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-16 lg:max-w-none lg:mx-0 lg:px-0">
            <div>
              <div>
                  <span
                      class="h-12 w-12 rounded-md flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600">
                    <InboxIcon aria-hidden="true" class="h-6 w-6 text-white"/>
                  </span>
              </div>
              <div class="mt-6">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">Stay on top of customer support</h2>
                <p class="mt-4 text-lg text-gray-500">Semper curabitur ullamcorper posuere nunc sed. Ornare iaculis
                  bibendum malesuada faucibus lacinia porttitor. Pulvinar laoreet sagittis viverra duis. In venenatis
                  sem arcu pretium pharetra at. Lectus viverra dui tellus ornare pharetra.</p>
                <div class="mt-6">
                  <a class="inline-flex bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white hover:from-purple-700 hover:to-indigo-700"
                     href="#">
                    Get started </a>
                </div>
              </div>
            </div>
            <div class="mt-8 border-t border-gray-200 pt-6">
              <blockquote>
                <div>
                  <p class="text-base text-gray-500">&ldquo;Cras velit quis eros eget rhoncus lacus ultrices sed diam.
                    Sit orci risus aenean curabitur donec aliquet. Mi venenatis in euismod ut.&rdquo;</p>
                </div>
                <footer class="mt-3">
                  <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0">
                      <img alt=""
                           class="h-6 w-6 rounded-full"
                           src="https://images.unsplash.com/photo-1509783236416-c9ad59bae472?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"/>
                    </div>
                    <div class="text-base font-medium text-gray-700">Marcia Hill, Digital Marketing Manager</div>
                  </div>
                </footer>
              </blockquote>
            </div>
          </div>
          <div class="mt-12 sm:mt-16 lg:mt-0">
            <div class="pl-4 -mr-48 sm:pl-6 md:-mr-16 lg:px-0 lg:m-0 lg:relative lg:h-full">
              <img
                  alt="Inbox user interface"
                  class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:left-0 lg:h-full lg:w-auto lg:max-w-none"
                  src="https://tailwindui.com/img/component-images/inbox-app-screenshot-1.jpg"/>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-24">
        <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24">
          <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-32 lg:max-w-none lg:mx-0 lg:px-0 lg:col-start-2">
            <div>
              <div>
                  <span
                      class="h-12 w-12 rounded-md flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600">
                    <SparklesIcon aria-hidden="true" class="h-6 w-6 text-white"/>
                  </span>
              </div>
              <div class="mt-6">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">Better understand your customers</h2>
                <p class="mt-4 text-lg text-gray-500">Semper curabitur ullamcorper posuere nunc sed. Ornare iaculis
                  bibendum malesuada faucibus lacinia porttitor. Pulvinar laoreet sagittis viverra duis. In venenatis
                  sem arcu pretium pharetra at. Lectus viverra dui tellus ornare pharetra.</p>
                <div class="mt-6">
                  <a class="inline-flex bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white hover:from-purple-700 hover:to-indigo-700"
                     href="#">
                    Get started </a>
                </div>
              </div>
            </div>
          </div>
          <div class="mt-12 sm:mt-16 lg:mt-0 lg:col-start-1">
            <div class="pr-4 -ml-48 sm:pr-6 md:-ml-16 lg:px-0 lg:m-0 lg:relative lg:h-full">
              <img
                  alt="Customer profile user interface"
                  class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:right-0 lg:h-full lg:w-auto lg:max-w-none"
                  src="https://tailwindui.com/img/component-images/inbox-app-screenshot-2.jpg"/>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Gradient Feature Section -->
    <div class="bg-gradient-to-r from-purple-800 to-indigo-700">
      <div class="max-w-4xl mx-auto px-4 py-16 sm:px-6 sm:pt-20 sm:pb-24 lg:max-w-7xl lg:pt-24 lg:px-8">
        <h2 class="text-3xl font-extrabold text-white tracking-tight">Inbox support built for efficiency</h2>
        <p class="mt-4 max-w-3xl text-lg text-purple-200">Ac tincidunt sapien vehicula erat auctor pellentesque
          rhoncus. Et magna sit morbi lobortis. Blandit aliquam sit nisl euismod mattis in.</p>
        <div
            class="mt-12 grid grid-cols-1 gap-x-6 gap-y-12 sm:grid-cols-2 lg:mt-16 lg:grid-cols-4 lg:gap-x-8 lg:gap-y-16">
          <div v-for="feature in features" :key="feature.name">
            <div>
                <span class="flex items-center justify-center h-12 w-12 rounded-md bg-white bg-opacity-10">
                  <component :is="feature.icon" aria-hidden="true" class="h-6 w-6 text-white"/>
                </span>
            </div>
            <div class="mt-6">
              <h3 class="text-lg font-medium text-white">{{ feature.name }}</h3>
              <p class="mt-2 text-base text-purple-200">
                {{ feature.description }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Stats section -->
    <div class="relative bg-gray-900">
      <div class="h-80 absolute inset-x-0 bottom-0 xl:top-0 xl:h-full">
        <div class="h-full w-full xl:grid xl:grid-cols-2">
          <div class="h-full xl:relative xl:col-start-2">
            <img alt="People working on laptops"
                 class="h-full w-full object-cover opacity-25 xl:absolute xl:inset-0"
                 src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2830&q=80&sat=-100"/>
            <div aria-hidden="true"
                 class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-gray-900 xl:inset-y-0 xl:left-0 xl:h-full xl:w-32 xl:bg-gradient-to-r"/>
          </div>
        </div>
      </div>
      <div
          class="max-w-4xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 xl:grid xl:grid-cols-2 xl:grid-flow-col-dense xl:gap-x-8">
        <div class="relative pt-12 pb-64 sm:pt-24 sm:pb-64 xl:col-start-1 xl:pb-24">
          <h2 class="text-sm font-semibold tracking-wide uppercase">
            <span
                class="bg-gradient-to-r from-purple-300 to-indigo-300 bg-clip-text text-transparent">Valuable Metrics</span>
          </h2>
          <p class="mt-3 text-3xl font-extrabold text-white">Get actionable data that will help grow your business</p>
          <p class="mt-5 text-lg text-gray-300">Rhoncus sagittis risus arcu erat lectus bibendum. Ut in adipiscing
            quis in viverra tristique sem. Ornare feugiat viverra eleifend fusce orci in quis amet. Sit in et vitae
            tortor, massa. Dapibus laoreet amet lacus nibh integer quis. Eu vulputate diam sit tellus quis at.</p>
          <div class="mt-12 grid grid-cols-1 gap-y-12 gap-x-6 sm:grid-cols-2">
            <p v-for="item in metrics" :key="item.id">
              <span class="block text-2xl font-bold text-white">{{ item.stat }}</span>
              <span class="mt-1 block text-base text-gray-300"
              ><span class="font-medium text-white">{{ item.emphasis }}</span> {{ item.rest }}</span
              >
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-white">
      <div
          class="max-w-4xl mx-auto py-16 px-4 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
          <span class="block">Ready to get started?</span>
          <span class="-mb-1 pb-1 block bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">Get in touch or create an account.</span>
        </h2>
        <div class="mt-6 space-y-4 sm:space-y-0 sm:flex sm:space-x-5">
          <a class="flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white hover:from-purple-700 hover:to-indigo-700"
             href="#">
            Learn more </a>
          <a class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-indigo-800 bg-indigo-50 hover:bg-indigo-100"
             href="#">
            Get started </a>
        </div>
      </div>
    </div>
    <div class="pb-64"></div>
  </GuestLayout>
</template>

<script lang="ts" setup>

import {Typed} from "@duskmoon/vue3-typed-js";
import type {TypedOptions} from "@duskmoon/vue3-typed-js";
import GuestLayout from "../../Layouts/GuestLayout.vue";
import HimatifThirdLogo from "../../Assets/HimatifThirdLogo.vue";
import {ChevronDownIcon} from '@heroicons/vue/24/solid'

import {Popover, PopoverButton, PopoverGroup, PopoverPanel} from '@headlessui/vue'
import {
  ChatBubbleBottomCenterTextIcon,
  ChatBubbleLeftEllipsisIcon,
  HeartIcon,
  InboxIcon,
  ChevronRightIcon,
  QuestionMarkCircleIcon,
  SparklesIcon,
  TrashIcon,
  UsersIcon,
  XMarkIcon, ChatBubbleLeftRightIcon, DocumentChartBarIcon, ArrowUturnLeftIcon, PencilIcon,
} from '@heroicons/vue/24/solid'


const solutions = [
  {
    name: 'Inbox',
    description: 'Get a better understanding of where your traffic is coming from.',
    href: '#',
    icon: InboxIcon,
  },
  {
    name: 'Messaging',
    description: 'Speak directly to your customers in a more meaningful way.',
    href: '#',
    icon: ChatBubbleBottomCenterTextIcon,
  },
  {
    name: 'Live Chat',
    description: "Your customers' data will be safe and secure.",
    href: '#',
    icon: ChatBubbleLeftRightIcon
  },
  {
    name: 'Knowledge Base',
    description: "Connect with third-party tools that you're already using.",
    href: '#',
    icon: QuestionMarkCircleIcon,
  },
]
const features = [
  {
    name: 'Unlimited Inboxes',
    description: 'Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.',
    icon: InboxIcon,
  },
  {
    name: 'Manage Team Members',
    description: 'Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.',
    icon: UsersIcon,
  },
  {
    name: 'Spam Report',
    description: 'Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.',
    icon: TrashIcon,
  },
  {
    name: 'Compose in Markdown',
    description: 'Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.',
    icon: PencilIcon,
  },
  {
    name: 'Team Reporting',
    description: 'Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.',
    icon: DocumentChartBarIcon,
  },
  {
    name: 'Saved Replies',
    description: 'Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.',
    icon: ArrowUturnLeftIcon,
  },
  {
    name: 'Email Commenting',
    description: 'Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.',
    icon: ChatBubbleBottomCenterTextIcon,
  },
  {
    name: 'Connect with Customers',
    description: 'Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.',
    icon: HeartIcon,
  },
]
const metrics = [
  {id: 1, stat: '8K+', emphasis: 'Companies', rest: 'use laoreet amet lacus nibh integer quis.'},
  {id: 2, stat: '25K+', emphasis: 'Countries around the globe', rest: 'lacus nibh integer quis.'},
  {id: 3, stat: '98%', emphasis: 'Customer satisfaction', rest: 'laoreet amet lacus nibh integer quis.'},
  {id: 4, stat: '12M+', emphasis: 'Issues resolved', rest: 'lacus nibh integer quis.'},
]

const options: TypedOptions = {
  strings: ["collaboration ", "profesinalism ", "creativeness ", "passion "],
  shuffle: false,
  loop: true,
  typeSpeed: 80,
  smartBackspace: true,
  backSpeed: 50,
  showCursor: false,
  backDelay: 800,
};
</script>
