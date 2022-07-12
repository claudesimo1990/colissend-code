<template>
  <div class="alert alert-primary alert-dismissible fade show">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <strong>Primary!</strong> This is a simple primary alert box.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
</template>

<script lang="ts">

import {Vue, Component} from 'vue-property-decorator';

@Component({
    props: {
        propsnotifications: Array
    }
})
export default class NotificationComponent extends Vue {

  notifications = []

    mounted(): void {
        this.notifications = this.$props.propsnotifications
    }

}
</script>
