const Ziggy = {"url":"http:\/\/product-star.test","port":null,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"index":{"uri":"\/","methods":["GET","HEAD"]},"weather":{"uri":"weather","methods":["GET","HEAD"]},"lessons.rating":{"uri":"lessons\/rating","methods":["GET","HEAD"]},"lessons.students_sort_by_viewed":{"uri":"lessons\/students-sort-by-viewed","methods":["GET","HEAD"]},"lessons.lessons_sort_by_views":{"uri":"lessons\/lessons-sort-by-views","methods":["GET","HEAD"]},"lessons.student_modal":{"uri":"lessons\/student-modal","methods":["GET","HEAD"]},"lessons.student_show":{"uri":"lessons\/student-show\/{user}","methods":["GET","HEAD"],"bindings":{"user":"id"}},"lessons.lesson_modal":{"uri":"lessons\/lesson-modal","methods":["GET","HEAD"]},"lessons.lesson_show":{"uri":"lessons\/lesson-show\/{lesson}","methods":["GET","HEAD"],"bindings":{"lesson":"id"}}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
