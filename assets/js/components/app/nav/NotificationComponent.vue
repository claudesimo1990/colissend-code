<template>
    <li class="nav-item dropdown">

        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">{{ notifications.length }}</span>
        </a><!-- End Notification Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
                Vous avez {{ notifications.length }} nouvelle(s) notification(s)
                <a :href="path"><span class="badge rounded-pill bg-primary p-2 ms-2">tout voir</span></a>
            </li>
            <div v-for="(notification, index) in  notifications" :key="index">
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li class="notification-item">
                    <i class="bx bxs-plane-take-off plane-icon text-success"></i>
                    <div>
                        <h4>{{ notification.data.title }}</h4>
                        <p>{{ notification.data.message | preview }}</p>
                        <p>{{ notification.created_at | ago }}</p>
                    </div>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>
            </div>
            <li class="dropdown-footer">
                <a href="#">voir toute(s) notification(s)</a>
            </li>

        </ul><!-- End Notification Dropdown Items -->

    </li>
</template>

<script lang="ts">

import {Vue, Component, Prop} from 'vue-property-decorator';
import store from "../../../store/store";

@Component({
    props: {
        path: String
    }
})
export default class NotificationComponent extends Vue {

    get notifications () {
        return store.getters['notification/notifications'];
    }

    mounted(): void {
        store.dispatch('notification/getNotifications');
    }

}
</script>
