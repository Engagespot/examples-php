<template>
    <div ref="bellIcon">Notifications</div>
  </template>
  
  <script type="module">
  import { render } from "@engagespot/client";
  
  export default {
    name: "Notifications",
    mounted: function () {
      const options = {
        apiKey: "your engagespot api key",
        userId: "john@test.com",
      };
      render(this.$refs.bellIcon, options);
    },
  };
  </script>