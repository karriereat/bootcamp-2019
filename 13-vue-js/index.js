/*------------------------------------------------------------------------------------*
 * Skip the first few lines and head directly to `const app = new Vue();` in line 33! *
 *------------------------------------------------------------------------------------*/

const STORAGE_KEY = "minimal-vuejs-mvc";
const todoStorage = {
    fetch() {
        const todos = JSON.parse(localStorage.getItem(STORAGE_KEY) || "[]");
        todos.forEach((todo, index) => {
            todo.id = index;
        });
        todoStorage.uid = todos.length;
        return todos;
    },
    save(todos) {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(todos));
    }
};

const filters = {
    all(todos) {
        return todos;
    },
    active(todos) {
        return todos.filter(todo => !todo.completed);
    },
    completed(todos) {
        return todos.filter(todo => todo.completed);
    }
};

// https://vuejs.org/v2/guide/
const app = new Vue({
    el: "#app",
    data: {
        todos: todoStorage.fetch(),
        newTodo: "",
        editedTodo: null,
        visibility: "all"
    },
    watch: {
        todos: {
            handler(todos) {
                todoStorage.save(todos);
            },
            deep: true
        }
    },
    computed: {
        filteredTodos() {
            return filters[this.visibility](this.todos);
        },
        remaining() {
            return filters.active(this.todos).length;
        },
        allDone: {
            get() {
                return this.remaining === 0;
            },
            set(value) {
                this.todos.forEach(todo => {
                    todo.completed = value;
                });
            }
        }
    },
    filters: {
        pluralize(count, word) {
            return count === 1 ? word : `${word}s`;
        }
    },
    methods: {
        addTodo() {
            const value = this.newTodo && this.newTodo.trim();
            if (!value) {
                return;
            }
            this.todos.push({
                id: todoStorage.uid++,
                title: value,
                completed: false
            });
            this.newTodo = "";
        },
        removeTodo(todo) {
            this.todos.splice(this.todos.indexOf(todo), 1);
        },
        editTodo(todo) {
            this.editedTodo = todo;
            this.titleBeforeEdit = todo.title;
        },
        doneEdit(todo) {
            if (!this.editedTodo) {
                return;
            }
            this.editedTodo = null;
            todo.title = todo.title.trim();
            if (!todo.title) {
                this.removeTodo(todo);
            }
        },
        cancelEdit(todo) {
            this.editedTodo = null;
            todo.title = this.titleBeforeEdit;
        },
        removeCompleted() {
            this.todos = filters.active(this.todos);
        }
    },
    directives: {
        // When the value of `v-todo-focus` evaluates to `true`,
        // focus the element after it's been added to the DOM.
        "todo-focus": function(el, binding) {
            if (binding.value) {
                Vue.nextTick(function() {
                    el.focus();
                });
            }
        }
    }
});
