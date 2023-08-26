<script>
import { defineComponent } from 'vue';
export default defineComponent({
  data() {
    return {
      isActive: true,
      links: [
        'Dashboard',
        'Message',
        'Profile',
        'Updates',
      ]
    }
  }
});
</script>

<template>
  <v-app id = "inspire">
    <v-app-bar variant="flat">
      <v-container class = "mx-auto d-flex align-center justify-center">
        <v-btn
            v-for="link in links"
            :key="link"
            :text="link"
            variant="text"
        >
        </v-btn>
        <v-spacer></v-spacer>

        <v-responsive max-width="160">
          <v-text-field
            density="compact"
            hide-details
            label="Search"
            rounded="lg"
            single-line
            variant="solo-filled"
          >
          </v-text-field>
        </v-responsive>
      </v-container>
    </v-app-bar>

    <v-main class = "bg-grey-lighten-3">
      <v-container>
        <v-row>
          <v-col cols="2">
            <v-sheet rounded = "lg">
              <v-list rounded = "lg">
                <v-list-item
                  v-for = "n in 5"
                  :key = "n"
                  :title = "`List item ${n}`"
                >
                </v-list-item>
                <v-divider class = "my-2"></v-divider>
                <v-list-item
                    color="grey-lighten-4"
                    title="Refresh"
                >
                </v-list-item>
              </v-list>
            </v-sheet>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
  <RouterLink to="/about">About</RouterLink>
  <RouterView></RouterView>
</template>

<style scoped>

</style>
