 <template>
  <!-- 新規モーダル -->
  <div
    class="modal fade"
    id="shinkiModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog custom1">
      <div class="modal-content custom">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">祝日登録</h1>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-header">祝日情報</div>
            <div class="card-body">
              <form @submit.prevent="addHoliday">
                <div class="row">
                  <div class="col-auto">
                    <label for="holidayDate" class="form-label">日付:</label>
                    <input
                      type="date"
                      v-model="addHolidayDate"
                      name="addHolidayDate"
                      id="holidayDate"
                      class="form-control"
                      style="width: 400px"
                    />
                    <div id="passwordHelpBlock" class="form-text"></div>
                  </div>

                  <div class="col-auto">
                    <label for="addHolidayName" class="form-label"
                      >祝日名:</label
                    >
                    <input
                      type="text"
                      name="addHolidayName"
                      v-model="addHolidayName"
                      id="addHolidayName"
                      class="form-control"
                      style="width: 400px"
                    />
                    <div id="passwordHelpBlock" class="form-text"></div>
                  </div>
                </div>
              </form>
              <div v-if="responseMessage">
                <p>{{ responseMessage }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >
            キャンセル
          </button>
          <button class="btn btn-Success" @click="addHoliday">登録</button>
        </div>
      </div>
    </div>
  </div>

  <!-- 更新モーダル -->
  <div
    class="modal fade"
    id="koushinModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog custom1">
      <div class="modal-content custom">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">祝日更新</h1>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-header">祝日情報</div>
            <div class="card-body">
              <div class="row">
                <div class="col-auto">
                  <label for="searchDate" class="form-label">日付:</label>
                  <input
                    type="date"
                    name="HolidayDate"
                    id="searchDate"
                    class="form-control"
                    style="width: 400px"
                  />
                  <div id="passwordHelpBlock" class="form-text"></div>
                </div>

                <div class="col-auto">
                  <label for="searchHoliday" class="form-label">祝日名:</label>
                  <input
                    type="text"
                    name="HolidayName"
                    id="searchHoliday"
                    class="form-control"
                    style="width: 400px"
                  />
                  <div id="passwordHelpBlock" class="form-text"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >
            キャンセル
          </button>
          <button type="button" class="btn btn-Primary">更新</button>
        </div>
      </div>
    </div>
  </div>

  <!-- 削除モーダル -->
  <div
    class="modal fade"
    id="sakuzyoModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog custom2">
      <div class="modal-content custom">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">祝日削除</h1>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">選択した祝日を削除しますか？</div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >
            キャンセル
          </button>
          <button type="button" class="btn btn-danger">削除</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "HolidayModalComponent",
  data() {
    return {
      addHolidayDate: "",
      addHolidayName: "",
      responseMessage: "",
    };
  },

  methods: {
    async addHoliday() {
      try {
        const response = await axios.post("/api/add", {
          addHolidayDate: this.addHolidayDate,
          addHolidayName: this.addHolidayName,
        });
        this.responseMessage = response.data.message;
        // this.$bvModal.hide("shinkiModal"); // モーダルを閉じる
        // モーダルを閉じる
        // this.isModalVisible = false;
      } catch (error) {
        this.responseMessage =
          error.response?.data.message || "エラーが発生しました。";
      }
    },
  },
};
</script>

<style scoped>
.custom {
  border-radius: 10; /* 角を直角にする */
}

.custom1 {
  width: 300%; /* 幅を200%に設定 */
  max-width: 1200px; /* 最大幅を900pxに設定 */
}

.custom2 {
  width: 180%; /* 幅を200%に設定 */
  max-width: 600px; /* 最大幅を900pxに設定 */
}

.modal-header {
  background-color: rgb(21, 222, 248);
  color: white;
}
</style>

