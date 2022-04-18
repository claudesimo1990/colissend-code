<template>
  <div class="container">
    <div class="row">
      <div class="chatbox chatbox22" :class="displayChat ? '' : 'chatbox--tray'">

          <a href="" @click.prevent="openChat()">
            <div class="chatbox__title text-white"><h5>Contacter {{ user.name }}</h5></div>
          </a>
        <div class="chatbox__body">
          <div class="chatbox__body__message chatbox__body__message--left">

            <div class="chatbox_timing">
              <ul>
                <li><a href="#"><i class="fa fa-calendar"></i> 22/11/2018</a></li>
                <li><a href="#"><i class="fa fa-clock-o"></i> 7:00 PM</a></li>
              </ul>
            </div>
            <img src="https://www.gstatic.com/webp/gallery/2.jpg" alt="Picture">
            <div class="clearfix"></div>
            <div class="ul_section_full">
              <ul class="ul_msg">
                <li><strong>Person Name</strong></li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
              </ul>
              <div class="clearfix"></div>
              <ul class="ul_msg2">
                <li><a href="#"><i class="fa fa-pencil"></i> </a></li>
                <li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li>
              </ul>
            </div>

          </div>
          <div class="chatbox__body__message chatbox__body__message--right">

            <div class="chatbox_timing">
              <ul>
                <li><a href="#"><i class="fa fa-calendar"></i> 22/11/2018</a></li>
                <li><a href="#"><i class="fa fa-clock-o"></i> 7:00 PM</a></li>
              </ul>
            </div>

            <img src="https://www.gstatic.com/webp/gallery/2.jpg" alt="Picture">
            <div class="clearfix"></div>
            <div class="ul_section_full">
              <ul class="ul_msg">
                <li><strong>Person Name</strong></li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
              </ul>
              <div class="clearfix"></div>
              <ul class="ul_msg2">
                <li><a href="#"><i class="fa fa-pencil"></i> </a></li>
                <li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li>
              </ul>
            </div>

          </div>
          <div class="chatbox__body__message chatbox__body__message--left">

            <div class="chatbox_timing">
              <ul>
                <li><a href="#"><i class="fa fa-calendar"></i> 22/11/2018</a></li>
                <li><a href="#"><i class="fa fa-clock-o"></i> 7:00 PM</a></li>
              </ul>
            </div>

            <img src="https://www.gstatic.com/webp/gallery/2.jpg" alt="Picture">
            <div class="clearfix"></div>
            <div class="ul_section_full">
              <ul class="ul_msg">
                <li><strong>Person Name</strong></li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
              </ul>
              <div class="clearfix"></div>
              <ul class="ul_msg2">
                <li><a href="#"><i class="fa fa-pencil"></i> </a></li>
                <li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li>
              </ul>
            </div>

          </div>
          <div class="chatbox__body__message chatbox__body__message--right">

            <div class="chatbox_timing">
              <ul>
                <li><a href="#"><i class="fa fa-calendar"></i> 22/11/2018</a></li>
                <li><a href="#"><i class="fa fa-clock-o"></i> 7:00 PM</a></li>
              </ul>
            </div>

            <img src="https://www.gstatic.com/webp/gallery/2.jpg" alt="Picture">
            <div class="clearfix"></div>
            <div class="ul_section_full">
              <ul class="ul_msg">
                <li><strong>Person Name</strong></li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
              </ul>
              <div class="clearfix"></div>
              <ul class="ul_msg2">
                <li><a href="#"><i class="fa fa-pencil"></i> </a></li>
                <li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li>
              </ul>
            </div>

          </div>
          <div class="chatbox__body__message chatbox__body__message--left">

            <div class="chatbox_timing">
              <ul>
                <li><a href="#"><i class="fa fa-calendar"></i> 22/11/2018</a></li>
                <li><a href="#"><i class="fa fa-clock-o"></i> 7:00 PM</a></li>
              </ul>
            </div>

            <img src="https://www.gstatic.com/webp/gallery/2.jpg" alt="Picture">
            <div class="clearfix"></div>
            <div class="ul_section_full">
              <ul class="ul_msg">
                <li><strong>Person Name</strong></li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
              </ul>
              <div class="clearfix"></div>
              <ul class="ul_msg2">
                <li><a href="#"><i class="fa fa-pencil"></i> </a></li>
                <li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li>
              </ul>
            </div>

          </div>
        </div>
        <div class="panel-footer">
          <div class="list-group-item" style="background-color: #012970">
            <div class="my-2">
              <textarea type="text" class="form-control"  placeholder="Laisser un message ..."></textarea>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script lang="ts">

import {Vue, Component} from 'vue-property-decorator';
import store from "../../../store/store";
import ContactComponent from "../shared/ContactComponent.vue";

@Component({
  components: { ContactComponent },
  props: {
    user: Object
  }
})
export default class BookMessage extends Vue {

  get displayChat(): boolean {
    return store.getters["message/chatStatus"];
  }

  openChat() {
    store.dispatch('message/openChat', !this.displayChat)
  }

}
</script>

<style lang="scss" scoped>
  @import "assets/sass/app/chat";
</style>