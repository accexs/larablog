import {isLoggedIn, logOut} from "./shared/utils/auth";

export default {
    state: {
        user: {},
        isLoggedIn: false
    },
    mutations: {
        setUser(state, payload) {
            state.user = payload;
        },
        setLoggedIn(state, payload) {
            state.isLoggedIn = payload;
        }
    },
    actions: {
        loadStoredState(context) {
            context.commit("setLoggedIn", isLoggedIn());
        },
        async loadUser({commit, dispatch}) {
            if (isLoggedIn()) {
                try {
                    const user = (await axios.get('/api/user')).data;
                    commit("setUser", user);
                    commit("setLoggedIn", true);
                } catch (e) {
                    dispatch("logout");
                }
            }
        },
        logout({commit}) {
            commit("setUser", {});
            commit("setLoggedIn", false);
            logOut();
        },
    }
};
